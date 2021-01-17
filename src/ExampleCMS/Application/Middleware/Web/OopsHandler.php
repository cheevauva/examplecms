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

    /**
     * @var \ExampleCMS\Contract\Factory\Module
     */
    public $moduleFactory;

    /**
     * @var \ExampleCMS\Contract\Factory\Theme
     */
    public $themeFactory;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (\ExampleCMS\Exception\Http $exception) {
            try {
                $request = $request->withAttribute('exception', $exception);

                if (!empty($exception->request)) {
                    $request = $request->withAttribute('module', $exception->request->getAttribute('module'));
                } else {
                    $request = $request->withAttribute('module', $request->getAttribute('module', $this->config->get(['base', 'module'])));
                }

                $request = $request->withAttribute('language', $this->config->get(['base', 'language']));

                $module = $this->moduleFactory->get($request->getAttribute('module'));

                $theme = $request->getAttribute('theme');
                $context = $request->withoutAttribute('session')->getAttributes();
                $context['exception'] = $exception;
                $context['request'] = $request;

                $data = $module->layout('exception')->execute($context);

                $response = $this->response;
                $response->getBody()->write($theme($data));
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


}
