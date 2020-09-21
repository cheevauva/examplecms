<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Responder\Field;

class Base extends \ExampleCMS\Responder\Common implements \ExampleCMS\Contract\Field
{

    protected $templateType = 'fields';

    protected function getTemplatePath()
    {
        return array(
            (string) $this->module,
            $this->templateType,
            $this->metadata['type'],
            !isset($this->metadata['template']) ? 'view' : $this->metadata['template'],
        );
    }

    protected function getEmptyTemplatePath()
    {
        return array(
            (string) $this->module,
            $this->templateType,
            'empty',
            'view',
        );
    }

    protected function getToken()
    {
        if ($this->model instanceof \ExampleCMS\Contract\Model\Form) {
            return $this->model->get('token');
        }

        return '';
    }

    public function getData($request)
    {
        $metadata = parent::getData($request);

        if (empty($metadata['label'])) {
            $metadata['label'] = $this->model->get($this->metadata['name']);
        }
        $metadata['id'] = $this->model->get('id');
        if ($this->model instanceof \ExampleCMS\Contract\Model\Form) {
            $metadata['token'] = $this->model->getToken();
        }

        return $metadata;
    }

}
