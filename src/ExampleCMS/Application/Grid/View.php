<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Grid;

class View extends Grid
{

    public function execute(array $context)
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
                $context['rows'][] = $this->module->row($meta)->execute($context->withAttribute('model', $item));
            }
        }

        return $context;
    }

}
