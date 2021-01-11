<?php

namespace ExampleCMS\Application\Middleware\Web;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class OopsHandler implements MiddlewareInterface
{

    /**
     * @var ResponseInterface 
     */
    public $response;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (\Exception $exception) {

            try {
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

                $response = $this->response;
                $response = $handler->handle($request);
                $response->getBody()->write($content);
            } catch (\Exception $ex) {
                throw $exception;
            }
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
