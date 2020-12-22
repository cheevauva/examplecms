<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Row;

class Basic extends \ExampleCMS\Responder\Common
{

    protected $templateType = 'rows';

    public function execute($request)
    {
        $data = parent::execute($request);
        $data['columns'] = array();

        foreach ($this->metadata['columns'] as $meta) {
            $data['columns'][] = $this->module->column($meta)->execute($request);
        }

        return $data;
    }

}
