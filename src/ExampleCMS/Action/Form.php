<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Action;

class Form extends Action
{

    public function execute()
    {
        $this->context->getForm()->bind($this->request, $this->context->getModel());
    }
}
