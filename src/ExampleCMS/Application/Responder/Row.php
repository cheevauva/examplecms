<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class Row extends \ExampleCMS\Responder
{

    protected $templateType = 'rows';

    public function execute(Context $context)
    {
        $data = parent::execute($context);
        $data['columns'] = [];

        foreach ($this->metadata['columns'] as $meta) {
            $data['columns'][] = $this->responder('column', $meta)->execute($context);
        }

        return $data;
    }

}
