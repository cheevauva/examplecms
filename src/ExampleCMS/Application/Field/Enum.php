<?php

namespace ExampleCMS\Application\Field;

class Enum extends Input
{

    protected $type = 'enum';

    public function execute($context)
    {
        $data = parent::execute($context);
        $data['options'] = $this->metadata['options'];
        
        return $data;
    }

}
