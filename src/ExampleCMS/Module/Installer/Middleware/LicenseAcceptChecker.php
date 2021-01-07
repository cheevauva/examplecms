<?php

namespace ExampleCMS\Module\Installer\Middleware;

use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use Psr\Http\Message\ResponseInterface;
use ExampleCMS\Exception\Http\NotFound as NotFoundException;

class LicenseAcceptChecker
{

    /**
     * @var \ExampleCMS\Contract\Config 
     */
    public $config;

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $moduleFactory;

    public function __invoke(RequestInterface $request, ResponseInterface $response, $next)
    {
        $isSetup = $this->config->get(['base', 'setup']);
        $module = $request->getAttribute('module');

        if (!$isSetup) {
            if ($module === 'Installer') {
                NotFoundException::withRequest($request);
            }

            return $next($request, $response);
        }

        if (in_array($request->getAttribute('route'), ['license', 'license_save'], true)) {
            return $next($request, $response);
        }

        $model = $this->moduleFactory->get($module)->query('find')->execute();

        if (!$model->get('license_accepted')) {
            $request = $request->withAttribute('redirect', [
                'route' => 'license',
                'params' => [],
            ]);
        }

        return $next($request, $response);
    }

}
