<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class FieldInput extends Field
{

    public function execute(Context $context)
    {
        $data = parent::execute($context);

        $data['name'] = $this->metadata['name'];
        $data['formName'] = $context->getAttribute('formName', '');
        $data['value'] = $context->getAttribute('formData', new \ArrayObject)[$this->metadata['name']];

        return $data;
    }

}
