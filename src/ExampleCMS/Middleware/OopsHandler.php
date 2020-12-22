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

            $module = $this->moduleFactory->get('Default');
            $layout = $module->responder()->layout('exception');

            $data = $layout->execute($request);
            $content =  $module->theme($this->getTheme($request))->make($data);

            $response->getBody()->write($content);
        }

        return $response;
    }

}
