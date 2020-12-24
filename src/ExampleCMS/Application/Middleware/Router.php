<?php

namespace ExampleCMS\Application\Middleware;

class Router
{

    /**
     * @var \ExampleCMS\Contract\Router
     */
    public $router;

    public function __invoke($request, $response, $next)
    {
        $path = str_replace($request->getAttribute('basePath'), '', $request->getUri()->getPath());

        if (empty($path)) {
            $path = '/';
        } else {
            $path = '/' . ltrim($path, '/');
        }

        $result = $this->router->match($path, $request->getMethod());

        if (!$result) {
            throw new \ExampleCMS\Exception\Http\NotFound;
        }

        foreach ($result['params'] as $name => $value) {
            $request = $request->withAttribute($name, $value);
        }

        foreach ($result['target'] as $name => $value) {
            $request = $request->withAttribute($name, $value);
        }

        $request = $request->withAttribute('route', $result['name']);

        return $next($request, $response);
    }

}
