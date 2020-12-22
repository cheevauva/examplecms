<?php

namespace ExampleCMS\Application\Field;

class Text extends Base
{

    /**
     * @var string
     */
    protected $fieldType = 'text';
    public function execute($request)
    {
        parent::execute($request);
    }
}
