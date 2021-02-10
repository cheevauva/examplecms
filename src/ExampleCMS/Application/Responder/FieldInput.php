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

        $formData = $context->getAttribute('formData', []);

        $data['name'] = $this->metadata['name'];
        $data['formName'] = $context->getAttribute('formName', '');
        $data['value'] = $formData[$this->metadata['name']] ?? $data['value'];

        return $data;
    }

}
