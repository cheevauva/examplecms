<?php

namespace ExampleCMS\Module\Installer\Middleware;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};
use ExampleCMS\Exception\Http\NotFound as NotFoundException;

class LicenseAcceptChecker implements MiddlewareInterface
{

    /**
     * @var \ExampleCMS\Contract\Config 
     */
    public $config;

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $moduleFactory;

    /**
     * @var \ExampleCMS\Contract\Factory\Action
     */
    public $actionFactory;

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var ResponseInterface 
     */
    public $response;

    public function __construct($metadata)
    {
        $this->metadata = $metadata;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $isSetup = $this->config->get('base.setup');
        $module = $request->getAttribute('module');

        if (!$isSetup && $module === 'Installer') {
            NotFoundException::withRequest($request);
        }

        if (!$isSetup) {
            return $handler->handle($request);
        }

        if (in_array($request->getAttribute('route'), ['license', 'license_save'], true)) {
            return $handler->handle($request);
        }

        $installer = $this->moduleFactory->get('Installer');

        $context = $request->getAttribute('context');

        foreach ($this->metadata['actions'] as $action) {
            $context = $this->actionFactory->get($action, $installer)->execute($context);
        }

        $location = $context->getAttribute('location');

        if ($location) {
            return $this->response->withHeader('Location', $request->getAttribute('router')($location))->withStatus(301);
        }

        return $handler->handle($request);
    }

}
