<?php

namespace ExampleCMS\Application\Action;

class Redirect extends Action
{

    public function execute(\ExampleCMS\Contract\Context $context): \ExampleCMS\Contract\Context
    {
        /* @var $router \ExampleCMS\Contract\Router */
        $router = $context->getAttribute('router');
        $location = $router->make($this->metadata['route'], $this->metadata['params'] ?? []);

        return $context->withAttribute('location', $location);
    }

}
