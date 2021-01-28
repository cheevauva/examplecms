<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class Column extends \ExampleCMS\Responder
{

    /**
     * @var string 
     */
    protected $templateType = 'columns';

    public function execute(Context $context)
    {
        $data = parent::execute($context);
        $data['grids'] = [];
        $data['fields'] = [];
        $data['colspan'] = 1;

        if (empty($this->metadata['fields'])) {
            $this->metadata['fields'] = [];
        }

        if (empty($this->metadata['grids'])) {
            $this->metadata['grids'] = [];
        }

        foreach ($this->metadata['fields'] as $index => $meta) {
            $data['fields'][$index] = $this->responder('field', $meta)->execute($context);
        }

        foreach ($this->metadata['grids'] as $index => $meta) {
            $data['grids'][$index] = $this->responder('grid', $meta)->execute($context);
        }

        return $data;
    }

}
