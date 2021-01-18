<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

class Grid extends \ExampleCMS\Application\Responder\Responder
{

    /**
     * @var string
     */
    protected $templateType = 'grids';

    public function execute(array $context)
    {
        $data = parent::execute($context);
        $data['rows'] = [];
        $data['name'] = $this->metadata['name'];

        foreach ($this->metadata['rows'] as $meta) {
            $data['rows'][] = $this->module->row($meta)->execute($context);
        }

        return $data;
    }

}
