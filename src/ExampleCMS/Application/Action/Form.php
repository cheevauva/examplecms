<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Action;

class Form extends Action
{

    public function execute()
    {
        $this->context->getForm()->bind($this->request, $this->context->getModel());
    }
}
