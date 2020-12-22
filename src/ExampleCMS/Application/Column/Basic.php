<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Column;

class Basic extends \ExampleCMS\Responder\Common
{

    /**
     * @var \ExampleCMS\Config
     */
    public $config;

    /**
     * @var string 
     */
    protected $templateType = 'columns';

    protected function getDefaultData()
    {
        return [
            'grids' => [],
            'fields' => [],
            'colspan' => 1,
        ];
    }

    public function execute($request)
    {
        $data = parent::execute($request);

        foreach ($data['fields'] as $index => $meta) {
            $data['fields'][$index] = $this->module->field($meta)->execute($request);
        }

        foreach ($data['grids'] as $index => $meta) {
            $data['grids'][$index] = $this->module->grid($meta)->execute($request);
        }

        return $data;
    }

}
