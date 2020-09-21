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

            $module = $this->moduleFactory->get('default');
            $layout = $module->getLayout('exception');

            $data = $layout->getData($request);
            $theme = $this->getTheme($request);
            $content = $theme->make($data);

            $response->getBody()->write($content);
        }

        return $response;
    }

}
