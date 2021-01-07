<?php

namespace ExampleCMS\Application\Middleware;

class Router
{

    /**
     * @var \ExampleCMS\Factory\Router
     */
    public $routerFactory;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    public function __invoke($request, $response, $next)
    {
        $router = $this->routerFactory->get($request->getAttribute('application'));

        if ($this->config->get(['base', 'semantic_url'])) {
            $router->setBaseUrl($request->getAttribute('baseUrl'));
        } else {
            $router->setBaseUrl($request->getServerParams()['SCRIPT_NAME']);
        }

        $request = $request->withAttribute('router', $router);

        $path = str_replace($request->getAttribute('baseUrl'), '', $request->getUri()->getPath());

        if (empty($path)) {
            $path = '/';
        } else {
            $path = '/' . ltrim($path, '/');
        }

        $result = $router->match($path, $request->getMethod());

        if (!$result) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        foreach ($result['target'] as $name => $value) {
            $request = $request->withAttribute($name, $value);
        }

        $request = $request->withAttribute('route', $result['name']);

        return $next($request, $response);
    }

}
