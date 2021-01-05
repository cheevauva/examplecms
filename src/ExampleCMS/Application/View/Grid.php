<?php

namespace ExampleCMS\Application\View;

class Grid extends View
{

    public function execute($request)
    {
        $metadata = parent::execute($request);

        $gridObject = $this->module->grid($this->metadata['grid']);

        $metadata['grid'] = $gridObject->execute($request);

        return $metadata;
    }

}
