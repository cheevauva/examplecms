<?php

namespace ExampleCMS\Middleware;

class OopsHandler extends \ExampleCMS\Middleware\Application
{

    public function __invoke($request, $response, $next)
    {
        try {
            return $next($request, $response);
        } catch (\Exception $exception) {
            $request = $request->withAttribute('exception', $exception);

            if (!empty($exception->request)) {
                $module = $this->getModule($exception->request);
            } else {
                $module = $this->moduleFactory->get('Default');
            }

            $theme = $this->getTheme($request);
            $data = $module->layout('exception')->execute($request);
            $content = $module->theme($theme)->make($data);

            $response->getBody()->write($content);
        }

        return $response;
    }

}
