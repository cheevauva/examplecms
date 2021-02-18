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

    /**
     * @var array
     */
    protected $requestAttributes = [
        'context-to-session',
        'responder',
        'actions',
        'module',
        'content-type',
    ];

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /* @var $context \ExampleCMS\Contract\Context */
        $context = $request->getAttribute('context');

        /* @var $router \ExampleCMS\Contract\Router */
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

        if (!empty($result['target']['context'])) {
            $context = $context->withAttributes($result['target']['context']);
            unset($result['target']['context']);
        }

        foreach ($this->requestAttributes as $requestAttribute) {
            if (empty($result['target'][$requestAttribute])) {
                continue;
            }

            $request = $request->withAttribute($requestAttribute, $result['target'][$requestAttribute]);

            unset($result['target'][$requestAttribute]);
        }

        $context = $context->withAttributes($result['target']);

        $request = $request->withAttribute('route', $result['name']);
        $request = $request->withAttribute('router', function (array $location) use ($router) {
            return $router->make($location);
        });
        $request = $request->withAttribute('context', $context);

        return $handler->handle($request);
    }

}
