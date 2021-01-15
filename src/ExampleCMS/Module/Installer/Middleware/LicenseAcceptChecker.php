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

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $isSetup = $this->config->get(['base', 'setup']);
        $module = $request->getAttribute('module');

        if (!$isSetup) {
            if ($module === 'Installer') {
                NotFoundException::withRequest($request);
            }

            return $handler->handle($request);
        }

        if (in_array($request->getAttribute('route'), ['license', 'license_save'], true)) {
            return $handler->handle($request);
        }
        
        $model = $this->moduleFactory->get('Installer')->query('find')->fetch();

        if (!$model->get('license_accepted')) {
            $request = $request->withAttribute('redirect', [
                'route' => 'license',
                'params' => [],
            ]);
        }

        return $handler->handle($request);
    }

}
