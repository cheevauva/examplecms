<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class GridView extends Grid
{

    public function execute(Context $context)
    {
        $context = parent::execute($context);
        $context['rows'] = [];

        foreach ($this->metadata['rows'] as $meta) {
            $items = [];

            if (empty($meta['iterate'])) {
                $items[] = $model;
            } else {
                $items = $models;
            }

            foreach ($items as $item) {
                $context['rows'][] = $this->responder('row', $meta)->execute($context->withAttribute('model', $item));
            }
        }

        return $context;
    }

}
