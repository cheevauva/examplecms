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
                $request = $request->withAttribute('module', $exception->request->getAttribute('module'));
            } else {
                $request = $request->withAttribute('module', $request->getAttribute('module', $this->config->get(['base', 'module'])));
            }

            $request = $request->withAttribute('language', $this->config->get(['base', 'language']));

            $module = $this->moduleFactory->get($request->getAttribute('module'));

            $themeName = $request->getAttribute('theme');

            if (empty($themeName)) {
                $themeName = $this->config->get('base.theme');
            }

            $context = $request->withoutAttribute('session')->getAttributes();
            $context['exception'] = $exception;
            $context['request'] = $request;

            $data = $module->layout('exception')->execute($context);
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
