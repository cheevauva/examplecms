<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class ViewList extends View
{

    public function execute(Context $context)
    {
        $data = parent::execute($context);

        $collection = $context->getCollection($this->metadata['collection']);

        foreach ($collection as $entity) {
            $data['entities'] = $entity->toArray();
        }
        
        return $data;
    }

}
