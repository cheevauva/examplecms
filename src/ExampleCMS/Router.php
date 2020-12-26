<?php

namespace ExampleCMS;

class Router implements \ExampleCMS\Contract\Container\Mediator
{

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    /**
     * @var \ExampleCMS\Contract\Bootstrap
     */
    public $bootstrap;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     * @var \AltoRouter
     */
    public $altoRouter;

    /**
     * @var array 
     */
    protected $routes = array();

    /**
     * @return array
     */
    protected function getRoutes()
    {
        $appName = $this->bootstrap->getAppName();

        if ($this->config->get('base.setup')) {
            $appName .= 'setup';
        }
        $this->routes = $this->metadata->get(['routes', $appName]);

        return $this->routes;
    }

    public function prepare()
    {
        foreach ($this->getRoutes() as $routeName => $route) {
            $this->altoRouter->map($route['method'], $route['route'], $route['target'], $routeName);
        }
    }

    public function getRoute($name)
    {
        if (!isset($this->routes[$name]['target'])) {
            return null;
        }

        return $this->routes[$name]['target'];
    }

    public function getOperation($name)
    {
        $route = $this->getRoute($name);

        $operation = 'default';

        if (!empty($route['operation'])) {
            $operation = $route['operation'];
        }

        return $operation;
    }

    public function make($route, array $params = array())
    {
        return $this->altoRouter->generate($route, $params);
    }

    public function makeWithRequest($request, $route, array $params = array())
    {
        if ($this->config->get(['base', 'semantic_url'])) {
            $baseUrl = $request->getAttribute('baseUrl');
        } else {
            $server = $request->getServerParams();
            $baseUrl = $server['SCRIPT_NAME'];
        }

        return $baseUrl . $this->make($route, $params);
    }

    public function generate($route, array $params = array())
    {
        return rtrim($this->make($route, $params), '*');
    }

    public function match($requestUrl, $method)
    {
        return $this->altoRouter->match($requestUrl, $method);
    }

    public function get()
    {
        $this->prepare();

        return $this;
    }

}
