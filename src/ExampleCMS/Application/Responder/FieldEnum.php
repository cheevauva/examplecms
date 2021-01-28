<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class FieldEnum extends FieldInput
{

    protected $type = 'enum';

    public function execute(Context $context)
    {
        $data = parent::execute($context);
        $data['options'] = $this->metadata['options'];

        return $data;
    }

}
