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
     * @var \ExampleCMS\Factory\Router
     */
    public $routerFactory;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
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

        foreach ($result['target'] as $name => $value) {
            $request = $request->withAttribute($name, $value);
        }

        $request = $request->withAttribute('route', $result['name']);
        $request = $request->withAttribute('router', $router);

        return $handler->handle($request);
    }

}
