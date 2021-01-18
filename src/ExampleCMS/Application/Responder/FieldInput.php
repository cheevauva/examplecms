<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

class FieldInput extends Field
{

    public function execute($context)
    {
        $data = parent::execute($context);

        $data['name'] = $this->metadata['name'];
        $data['formName'] = $context['formName'];
        $data['value'] = $context['formData'][$this->metadata['name']];

        return $data;
    }

}
