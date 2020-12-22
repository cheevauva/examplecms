<?php

namespace ExampleCMS\Application\View;

class Grid extends Basic
{

    public function execute($request)
    {
        $metadata = parent::execute($request);

        $gridObject = $this->module->grid($this->metadata['grid']);
        $gridObject->setModel($this->model);

        $metadata['grid'] = $gridObject->execute($request);

        return $metadata;
    }

}
