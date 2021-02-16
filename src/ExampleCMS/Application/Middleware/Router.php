<?php

namespace ExampleCMS\Application\Middleware;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class Router implements MiddlewareInterface
{

    /**
     * @var \ExampleCMS\Contract\Factory\Router
     */
    public $routerFactory;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /* @var $context \ExampleCMS\Contract\Context */
        $context = $request->getAttribute('context');

        $router = $this->routerFactory->get($request->getAttribute('application'));
        $router->setBaseUrl($request->getAttribute('baseUrl'));


        $path = $request->getUri()->getPath();

        if (!$this->config->get(['base', 'semantic_url'])) {
            if (substr($path, -1) !== '/') {
                $path .= '/';
            }
        }

        $result = $router->match($path, $request->getMethod());

        if (!$result) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        if (!empty($result['target']['session_from_context'])) {
            $request = $request->withAttribute('session_from_context', $result['target']['session_from_context']);
            unset($result['target']['session_from_context']);
        }

        $context = $context->withAttributes($result['target']);
        $context = $context->withAttribute('route', $result['name']);
        $context = $context->withAttribute('router', $router);

        $request = $request->withAttribute('context', $context);

        return $handler->handle($request);
    }

}
