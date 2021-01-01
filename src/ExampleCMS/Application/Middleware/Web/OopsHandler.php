<?php

namespace ExampleCMS\Application\Middleware\Web;

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
                $module = $this->moduleFactory->get($this->config->get(['base', 'module']));
            }

            $themeName = $request->getAttribute('theme');

            if (empty($themeName)) {
                $themeName = $this->config->get('base.theme');
            }

            $data = $module->layout('exception')->execute($request);
            $content = $this->getThemeByRequest($request)->render($data);

            $response->getBody()->write($content);
        }

        return $response;
    }

    protected function getModuleByRequest($request)
    {
        return $this->moduleFactory->get($request->getAttribute('module'));
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

}
