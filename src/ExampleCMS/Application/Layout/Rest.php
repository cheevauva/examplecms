<?php

namespace ExampleCMS\Application\Layout;

class Rest extends Layout
{

    protected $templateType = 'layouts';

    public function execute($context)
    {
        $data = parent::execute($context);

        return $data;
    }
    

}
