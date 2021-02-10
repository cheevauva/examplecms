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
            $entityForm = $this->entity('form');
            $entityForm->bind($entity);

            $data['entities'][] = $entityForm->encode();
        }

        return $data;
    }

}
