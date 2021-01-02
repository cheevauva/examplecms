<?php

namespace ExampleCMS\Application\Middleware\Web;

class FrontController
{

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $moduleFactory;

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $themeFactory;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    const CONTENT_TYPE_DEFAULT = 'text/html';

    public function __invoke($request, $response, $next)
    {
        $module = $this->getModuleByRequest($request);
        $action = $request->getAttribute('action');
        $layout = $request->getAttribute('layout');

        $request = $this->presetLanguageByRequest($request);

        if ($action) {
            $request = $module->action($action)->execute($request);
        }

        $response = $this->redirectByRequest($request, $response);

        if ($response->getStatusCode() === 301) {
            return $next($request, $response);
        }

        if ($layout) {
            $data = $module->layout($layout)->execute($request);

            $theme = $this->getThemeByRequest($request);
            
            $content = $theme->render($data);

            $response->getBody()->write($content);
        }

        $response = $this->contentTypeByRequest($request, $response);

        return $next($request, $response);
    }

    public function contentTypeByRequest($request, $response)
    {
        $contentType = $request->getAttribute('contentType');

        if (empty($contentType)) {
            $contentType = static::CONTENT_TYPE_DEFAULT;
        }

        return $response->withHeader('Content-Type', $contentType);
    }

    public function redirectByRequest($request, $response)
    {
        $redirect = $request->getAttribute('redirect');

        if (!empty($redirect)) {
            $location = $this->router->makeWithRequest($request, $redirect['route'], $redirect['params']);

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

        return $this->themeFactory->get($theme);
    }

    protected function presetLanguageByRequest($request)
    {
        $language = $request->getAttribute('language');
        $session = $request->getAttribute('session');

        if (!$language) {
            $language = $session->get('language');

            if (!$language) {
                $language = $this->config->get('base.language');
            }
            
            $request = $request->withAttribute('language', $language);
        }

        return $request;
    }

}
