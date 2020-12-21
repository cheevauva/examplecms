<?php

namespace ExampleCMS\Application\View;

class Grid extends Basic
{

    public function getData($request)
    {
        $metadata = parent::getData($request);

        $gridObject = $this->responder->grid($this->metadata['grid']);
        $gridObject->setModel($this->model);

        $metadata['grid'] = $gridObject->getData($request);

        return $metadata;
    }

}
