<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class ViewForm extends View
{

    public function execute(Context $context)
    {
        $data = parent::execute($context);
        $data['grids'] = [];

        if (empty($this->metadata['entity'])) {
            throw new \RuntimeException('"entity" is not defined in metadata');
        }

        if (!$context->hasEntity($this->metadata['entity'])) {
            throw new \RuntimeException(sprintf('entity "%s" is not defined in context', $this->metadata['entity']));
        }

        /* @var $enity \ExampleCMS\Contract\Application\Entity */
        $enity = $context->getEntity($this->metadata['entity']);

        if (empty($this->metadata['method'])) {
            throw new \RuntimeException('"method" is not defined in metadata');
        }

        if (empty($this->metadata['route'])) {
            throw new \RuntimeException('"route" is not defined in metadata');
        }

        $data['method'] = $this->metadata['method'];
        $data['action'] = [$this->metadata['route'], $enity->attributes()];

        $context = $context->withAttribute('formName', $enity->entityName());
        $context = $context->withAttribute('formData', $enity->encode());

        foreach ($this->metadata['grids'] as $index => $meta) {
            $data['grids'][$index] = $this->responder('grid', $meta)->execute($context);
        }

        return $data;
    }

}
