<?php

namespace ExampleCMS\Middleware;

class CliApplication extends Application
{

    public $moduleFactory;
    public $metadata;
    public $themeFactory;

    public function __invoke($request, $response, $next)
    {
        $module = $this->getModule($request);
        $action = $module->getAction($request->getAttribute('action'));
        $response = $action->execute($request, $response);

        return $next($request, $response);
    }

}
