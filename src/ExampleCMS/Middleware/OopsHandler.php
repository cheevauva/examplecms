<?php

namespace ExampleCMS\Middleware;

class OopsHandler extends \ExampleCMS\Middleware\Application
{

    public function __invoke($request, $response, $next)
    {
        try {
            return $next($request, $response);
        } catch (\ExampleCMS\Exception\Http $exception) {
            $request = $request->withAttribute('exception', $exception);

            $theme = $this->getTheme($request);
            $module = $this->moduleFactory->get('Default');
            $data = $module->layout('exception')->execute($request);
            $content =  $module->theme($theme)->make($data);

            $response->getBody()->write($content);
        }

        return $response;
    }

}
