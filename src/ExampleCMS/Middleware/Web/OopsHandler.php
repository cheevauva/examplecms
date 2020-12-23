<?php

namespace ExampleCMS\Middleware\Web;

class OopsHandler
{

    public function __invoke($request, $response, $next)
    {
        try {
            return $next($request, $response);
        } catch (\Exception $exception) {
            $request = $request->withAttribute('exception', $exception);

            if (!empty($exception->request)) {
                $module = $this->getModuleByRequest($exception->request);
            } else {
                $module = $this->moduleFactory->get('Default');
            }
            $themeName = $request->getAttribute('theme');

            if (empty($themeName)) {
                $themeName = $this->config->get('base.theme');
            }

            $data = $module->layout('exception')->execute($request);
            $content = $module->theme($themeName)->make($data);

            $response->getBody()->write($content);
        }

        return $response;
    }

    protected function getModuleByRequest($request)
    {
        return $this->moduleFactory->get($request->getAttribute('module'));
    }

}
