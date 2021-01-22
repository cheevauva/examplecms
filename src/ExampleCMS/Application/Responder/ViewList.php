<?php

namespace ExampleCMS\Application\Responder;

class ViewList extends View
{

    public function execute(array $context)
    {
        $data = parent::execute($context);
        return $data;
    }

}
