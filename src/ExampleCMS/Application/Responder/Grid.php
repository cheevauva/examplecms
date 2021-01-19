<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

class Grid extends \ExampleCMS\Responder
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
            $data['rows'][] = $this->responder('row', $meta)->execute($context);
        }

        return $data;
    }

}
