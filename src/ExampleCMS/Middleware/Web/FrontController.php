<?php

namespace ExampleCMS\Middleware\Web;

class FrontController
{

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $moduleFactory;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    public function __invoke($request, $response, $next)
    {
        $module = $this->getModuleByRequest($request);

        $action = $request->getAttribute('action');
        $layout = $request->getAttribute('layout');

        if ($action) {
            $request = $module->action($action)->execute($request);
        }

        $response = $this->redirectByRequest($request, $response);

        if ($response->getStatusCode() === 301) {
            return $next($request, $response);
        }

        $language = $this->getLanguageByRequest($request);
        $themeName = $this->getThemeByRequest($request);

        if ($layout) {
            $data = $module->layout($layout)->execute($request);

            $theme = $module->theme($themeName);
            $theme->setLanguage($language);

            $content = $theme->make($data);

            $response->getBody()->write($content);
        }

        return $next($request, $response);
    }

    public function redirectByRequest($request, $response)
    {
        $redirect = $request->getAttribute('redirect');

        if (!empty($redirect)) {
            $location = $this->router->make($redirect['route'], $redirect['params']);

            $response = $response->withHeader('Location', $location);
            $response = $response->withStatus(301);
        }

        return $response;
    }

    protected function getModuleByRequest($request)
    {
        $module = $request->getAttribute('module');

        if (empty($module)) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        $modules = $this->metadata->get(['modules']);

        if (empty($modules[$module])) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        if (!empty($modules[$module]['hide'])) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        return $this->moduleFactory->get($module);
    }

    protected function getThemeByRequest($request)
    {
        $theme = $request->getAttribute('theme');
        $session = $request->getAttribute('session');

        if (empty($theme)) {
            $theme = $session->get('theme');

            if (!$theme) {
                $theme = $this->config->get('base.theme');
            }
        }

        return $theme;
    }

    protected function getLanguageByRequest($request)
    {
        $language = $request->getAttribute('language');
        $session = $request->getAttribute('session');

        if (!$language) {
            $language = $session->get('language');

            if (!$language) {
                $language = $this->config->get('base.language');
            }
        }

        return $language;
    }

}
