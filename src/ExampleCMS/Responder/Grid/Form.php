<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Responder\Grid;

class Form extends Basic
{

    protected $model;

    public function setModel($model)
    {
        $this->model = $model;
    }

    protected function getModel()
    {
        return $this->model;
    }
    
    public function getData($request)
    {
        $model = $this->getModel();

        $metadata = parent::getData($request);
        $metadata['rows'] = array();

        foreach ($this->metadata['rows'] as $row) {
            $rowObject = $this->responder->row($row);
            $rowObject->setModel($model);

            $metadata['rows'][] = $rowObject->getData($request);
        }

        return $metadata;
    }

}
