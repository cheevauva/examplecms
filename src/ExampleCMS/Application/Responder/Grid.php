<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class Grid extends \ExampleCMS\Responder
{

    /**
     * @var string
     */
    protected $templateType = 'grids';

    public function execute(Context $context)
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
