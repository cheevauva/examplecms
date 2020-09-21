<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Responder\Row;

class Basic extends \ExampleCMS\Responder\Common
{

    protected $templateType = 'rows';

    public function getData($request)
    {
        $metadata = parent::getData($request);

        $metadata['columns'] = array();

        foreach ($this->metadata['columns'] as $column) {
            $columnObject = $this->responder->column($column);
            $columnObject->model = $this->model;
            
            $metadata['columns'][] = $columnObject->getData($request);
        }

        return $metadata;
    }

}
