<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

class FieldLabel extends Field
{

    protected $type = 'label';

    public function execute($context)
    {
        $data = parent::execute($context);
        $data['label'] = $this->metadata['label'];

        return $data;
    }

}
