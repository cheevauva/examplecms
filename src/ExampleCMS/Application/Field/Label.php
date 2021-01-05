<?php

namespace ExampleCMS\Application\Field;

class Label extends Field
{

    protected $type = 'label';

    public function execute($context)
    {
        $data = parent::execute($context);
        $data['label'] = $this->metadata['label'];

        return $data;
    }

}
