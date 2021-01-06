<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Row;

class Basic extends \ExampleCMS\Application\Responder
{

    protected $templateType = 'rows';

    public function execute($context)
    {
        $data = parent::execute($context);
        $data['columns'] = [];

        foreach ($this->metadata['columns'] as $meta) {
            $data['columns'][] = $this->module->column($meta)->execute($context);
        }

        return $data;
    }

}
