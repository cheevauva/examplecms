<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Responder;

class Column extends \ExampleCMS\Application\Responder\Responder
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

    public function execute(array $context)
    {
        $data = parent::execute($context);

        if (empty($this->metadata['fields'])) {
            $this->metadata['fields'] = [];
        }

        if (empty($this->metadata['grids'])) {
            $this->metadata['grids'] = [];
        }

        foreach ($this->metadata['fields'] as $index => $meta) {
            $data['fields'][$index] = $this->module->field($meta)->execute($context);
        }

        foreach ($this->metadata['grids'] as $index => $meta) {
            $data['grids'][$index] = $this->module->grid($meta)->execute($context);
        }

        return $data;
    }

}
