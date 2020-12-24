<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Grid;

class Basic extends \ExampleCMS\Application\Responder
{

    /**
     * @var array
     */
    protected $models;

    /**
     * @var string
     */
    protected $templateType = 'grids';

    public function execute($request)
    {
        $data = parent::execute($request);
        $data['rows'] = [];

        foreach ($this->metadata['rows'] as $meta) {
            $data['rows'][] = $this->module->row($meta)->execute($request);
        }

        return $data;
    }

}
