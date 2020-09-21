<?php

namespace ExampleCMS\Middleware;

class Application
{

    public $moduleFactory;
    public $metadata;
    public $themeFactory;

    protected function getModule($request)
    {
        $module = $request->getAttribute('module');

        if (empty($module)) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        $modules = $this->metadata->get([
            'modules'
        ]);

        if (empty($modules[$module])) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        if (!empty($modules[$module]['hide'])) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        return $this->moduleFactory->get($module);
    }

    protected function getTheme($request)
    {
        $theme = $request->getAttribute('theme');

        if (empty($theme)) {
            $theme = 'default';
        }

        return $this->themeFactory->get($theme);
    }

    public function __invoke($request, $response, $next)
    {
        $module = $this->getModule($request);

        $action = $request->getAttribute('action');

        if ($action) {
            $actionObject = $module->action($action);
            $actionObject->execute($request);
        }

        $layout = $request->getAttribute('layout');

        if ($layout) {
            $layoutObject = $module->responder()->layout($layout);

            $data = $layoutObject->getData($request);
            $theme = $this->getTheme($request);
            $content = $theme->make($data);

            $response->getBody()->write($content);
        }

        return $next($request, $response);
    }

}
