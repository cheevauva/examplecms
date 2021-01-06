<?php

namespace ExampleCMS\Module\Installer\Middleware;

class LicenseAcceptChecker
{

    public function __invoke($request, $response, $next)
    {
        $isSetup = $this->config->get(['base', 'setup']);
        $module = $request->getAttribute('module');

        if (!$isSetup) {
            if ($module === 'Installer') {
                \ExampleCMS\Exception\Http\NotFound::withRequest($request);
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
