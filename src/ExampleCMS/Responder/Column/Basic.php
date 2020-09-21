<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Responder\Column;

class Basic extends \ExampleCMS\Responder\Common
{

    /**
     * @var \ExampleCMS\Config
     */
    public $config;
    protected $templateType = 'columns';

    protected function prepareGrid($grid, $request)
    {
        $gridObject = $this->responder->grid($grid);
        $gridObject->setModels(array(
            $this->model,
        ));

        return $gridObject->getData();
    }

    protected function prepareFields($fields, $request)
    {
        $preparedFields = array();

        foreach ($fields as $field) {
            $fieldObject = $this->responder->field($field);
            $fieldObject->model = $this->model;
            
            $preparedFields[] = $fieldObject->getData($request);
        }

        return $preparedFields;
    }

    public function getData($request)
    {
        $metadata = parent::getData($request);

        if (!isset($metadata['colspan'])) {
            $metadata['colspan'] = 1;
        }

        if (isset($metadata['fields'])) {
            $metadata['fields'] = $this->prepareFields($metadata['fields'], $request);
        }

        if (isset($metadata['grid'])) {
            $metadata['grid'] = $this->prepareGrid($metadata['grid'], $request);
        }


        return $metadata;
    }
}
