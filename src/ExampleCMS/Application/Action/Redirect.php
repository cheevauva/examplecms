<?php

namespace ExampleCMS\Application\Action;

class Redirect extends Action
{

    public function execute(\ExampleCMS\Contract\Context $context): \ExampleCMS\Contract\Context
    {
        return $context->withAttribute('location', [
            $this->metadata['route'],
            $this->metadata['params'] ?? []
        ]);
    }

}
