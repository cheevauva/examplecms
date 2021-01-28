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
     * @var \ExampleCMS\Contract\Factory\Renderer
     */
    public $rendererFactory;

    /**
     * @var \ExampleCMS\Contract\Factory\Responder
     */
    public $responderFactory;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

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

                $responder = $this->responderFactory->get($module, 'layout', 'exception');


                /* @var $context \ExampleCMS\Contract\Context */
                $context = $request->getAttribute('context');
                $renderer = $context->getAttribute('renderer');
                $context = $context->withAttribute('exception', $exception);
                $context = $context->withAttribute('request', $request);

                $data = $responder($context);
                $content = $renderer($data);

                $response = $this->response;
                $response->getBody()->write($content);
            } catch (\Exception $ex) {
                throw $ex;
            }
        }

        return $response;
    }

    protected function getModuleByRequest($request)
    {
        return $this->moduleFactory->get($request->getAttribute('module'));
    }

}
