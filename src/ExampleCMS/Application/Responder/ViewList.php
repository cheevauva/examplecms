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
        $data['rows'] = [];

        $collection = $context->getCollection($this->metadata['collection']);

        foreach ($collection as $entity) {
            $newContext = $context->withAttribute('formData', $entity->encode());
            
            foreach ($this->metadata['rows'] as $meta) {
                $data['rows'][] = $this->responder('row', $meta)->execute($newContext);
            }
        }

        return $data;
    }

}
