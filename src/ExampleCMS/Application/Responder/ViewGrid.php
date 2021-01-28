<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class ViewGrid extends View
{

    public function execute(Context $request)
    {
        $metadata = parent::execute($request);

        $gridObject = $this->responder('grid', $this->metadata['grid']);

        $metadata['grid'] = $gridObject->execute($request);

        return $metadata;
    }

}
