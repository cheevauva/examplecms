<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

class ViewGrid extends View
{

    public function execute($request)
    {
        $metadata = parent::execute($request);

        $gridObject = $this->responder('grid', $this->metadata['grid']);

        $metadata['grid'] = $gridObject->execute($request);

        return $metadata;
    }

}
