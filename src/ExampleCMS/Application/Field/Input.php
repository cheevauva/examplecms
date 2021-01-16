<?php

namespace ExampleCMS\Application\Field;

class Input extends Field
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
