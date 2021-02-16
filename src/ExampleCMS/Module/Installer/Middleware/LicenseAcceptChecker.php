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
     * @var \ExampleCMS\Contract\Factory\Query
     */
    public $queryFactory;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $isSetup = $this->config->get(['base', 'setup']);

        $context = $request->getAttribute('context');
        $module = $context->getAttribute('module');

        if (!$isSetup) {
            if ($module === 'Installer') {
                NotFoundException::withRequest($request);
            }

            return $handler->handle($request);
        }

        if (in_array($context->getAttribute('route'), ['license', 'license_save'], true)) {
            return $handler->handle($request);
        }

        $installer = $this->moduleFactory->get('Installer');
        $enity = $this->queryFactory->get('find', $installer)->fetch()->entity();

        if ($enity->isEmpty('license_accepted')) {
            $context = $context->withAttribute('actions', [
                [
                    'component' => 'redirect',
                    'route' => 'license',
                ]
            ]);
            $request = $request->withAttribute('context', $context);
        }

        return $handler->handle($request);
    }

}
