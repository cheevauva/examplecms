<?php

namespace ExampleCMS\Middleware;

class Application
{

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $moduleFactory;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     * 
     * @param type $request
     * @return \ExampleCMS\Contract\Module
     * @throws \ExampleCMS\Exception\Http\NotFound
     */
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

        return $theme;
    }

    public function __invoke($request, $response, $next)
    {
        $module = $this->getModule($request);

        $action = $request->getAttribute('action');
        $layout = $request->getAttribute('layout');
        $language = $request->getAttribute('language');
        $session = $request->getAttribute('session');
        $themeName = $this->getTheme($request);

        if ($action) {
            $request = $module->action($action)->execute($request);
        }

        $redirectTo = $request->getAttribute('redirect_to');

        if (!empty($redirectTo)) {
            $model = $request->getAttribute('model');

            $response = $response->withHeader('Location', $this->router->make($redirectTo));

            return $next($request, $response);
        }



        if (!$language) {
            $language = $session->get('language');

            if (!$language) {
                $language = 'en_US';
            }
        }

        if ($layout) {
            $data = $module->layout($layout)->execute($request);

            $theme = $module->theme($themeName);
            $theme->setLanguage($language);

            $content = $theme->make($data);

            $response->getBody()->write($content);
        }


        return $next($request, $response);
    }

}
