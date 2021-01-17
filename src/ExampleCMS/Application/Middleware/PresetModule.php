<?php

namespace ExampleCMS\Application\Middleware;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class PresetModule implements MiddlewareInterface
{

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $moduleFactory;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $module = $request->getAttribute('module');

        if (empty($module)) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        $modules = $this->metadata->get(['modules']);

        if (empty($modules[$module])) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        if (!empty($modules[$module]['hide'])) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        $request = $request->withAttribute('module', $this->moduleFactory->get($module));

        return $handler->handle($request);
    }

}
