<?php

namespace ExampleCMS;

use ExampleCMS\Exception\Http\BadRequest;
use ExampleCMS\Exception\Http\ServerError;

class FormManager
{

    public $session;

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $moduleFactory;

    /**
     * 
     * @param type $request
     * @return \ExampleCMS\Contract\Model\Form
     * @throws \ExampleCMS\Exception\Http\BadRequest
     */
    public function getFormsByRequest($request)
    {
        $body = $request->getParsedBody();
        $forms = $request->getAttribute('forms');
        $models = [];
        $metadataProperties = array(
            'module',
            'form',
            'route',
        );
        
        if (empty($forms)) {
            throw ServerError::withRequestAndMessage($request, 'forms_is_not_defined');
        }

        foreach ($forms as $form) {
            if (!isset($body[$form])) {
                throw BadRequest::withRequestAndMessage($request, sprintf('too_few_forms_sent'));
            }

            $model = $this->getFormModel($request->getAttribute('module'), $form);
            $model->fromArray($body[$form]);
            $model->setState($model::NORMAL);

//            $registredForm = $model->getMetadata();
//
//            foreach ($metadataProperties as $metadataProperty) {
//                if ($registredForm[$metadataProperty] !== $request->getAttribute($metadataProperty)) {
//                    throw BadRequest::withRequestAndMessage($request, 'wrong_destination_for_form');
//                }
//            }

            $models[$form] = $model;
        }


        return $models;
    }

    /**
     * @param string $module
     * @param string $form
     * @return \ExampleCMS\Contract\Model\Form
     */
    public function getFormModel($module, $form)
    {
        if (is_string($module)) {
            $module = $this->moduleFactory->get($module);
        }

        return $module->form($form);
    }

    protected function getBrokenForm($token, $data, $request)
    {
        $form = $this->getFormModel($request->getAttribute('module'), $request->getAttribute('form'));
        $form->setToken($token);
        $form->setState($form::BROKEN);
        $form->setStateReason('form_is_not_registered');
        $form->fromArray($data);

        $this->registrationTokenByForm($request, $form);

        return $form;
    }

    /**
     * @param object $form
     * @return string
     */
    protected function registrationTokenByForm($request, $form)
    {
        $session = $request->getAttribute('session');

        $metadata = $form->getMetadata();
        $metadata['module'] = (string) $form->module;
        $limit = 10;

        unset($metadata['mapping']);

        if (!empty($metadata['limit'])) {
            $limit = $metadata['limit'];
        }

        $registredForms = $session->get(array(
            'forms',
            $metadata['module'],
            $metadata['name'],
        ));

        if (empty($registredForms)) {
            $registredForms = [];
        }

        if (count($registredForms) > $limit) {
            $session->set(array(
                'forms',
                $metadata['module'],
                $metadata['name'],
            ), array());
        }

        $token = $form->getToken();

        if (empty($token)) {
            $token = $this->generateGUID();
        }

        $session->set(array(
            'forms',
            (string) $form->module,
            $metadata['name'],
            $token,
        ), $metadata);

        return $token;
    }

    /**
     * @param string $module
     * @param string $form
     * @return \ExampleCMS\Contract\Model\Form
     */
    public function createForm($request, $module, $form)
    {
        $formModel = $this->getFormModel($module, $form);
        $formModel->setToken($this->registrationTokenByForm($request, $formModel));
        $formModel->setState($formModel::NOT_SEND);

        return $formModel;
    }

    protected function getMetadataByToken($token)
    {
        return $this->session->get('forms.' . $token);
    }

    protected function generateGUID()
    {
        $guid = sprintf('%04X%04X-', mt_rand(0, 65535), mt_rand(0, 65535));
        $guid .= sprintf('%04X-%04X-', mt_rand(0, 65535), mt_rand(16384, 20479));
        $guid .= sprintf('%04X-%04X', mt_rand(32768, 49151), mt_rand(0, 65535));
        $guid .= sprintf('%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535));

        return $guid;
    }

}
