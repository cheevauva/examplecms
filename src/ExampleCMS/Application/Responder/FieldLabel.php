<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class FieldLabel extends Field
{

    protected $type = 'label';

    public function execute(Context $context)
    {
        $data = parent::execute($context);
        $data['label'] = $this->metadata['label'];

        return $data;
    }

}
