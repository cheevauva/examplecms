<?php

namespace ExampleCMS;

class Router implements \ExampleCMS\Contract\Router
{

    /**
     * @var \AltoRouter
     */
    public $altoRouter;

    /**
     * @var array 
     */
    protected $routes = [];

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     * @param array $routes
     */
    public function setRoutes($routes)
    {
        foreach ($routes as $routeName => $route) {
            $this->altoRouter->map($route['method'], $route['route'], $route['target'], $routeName);
        }
    }

    public function setBaseUrl($baseUrl)
    {
        $this->altoRouter->setBasePath($baseUrl);
    }

    public function make(array $location)
    {
        if (count($location) !== 2) {
            throw new \Exception(sprintf('incorrect route: %s', print_r($location)));
        }
        
        return $this->altoRouter->generate($location[0], $location[1]);
    }

    public function generate($route, array $params = array())
    {
        return rtrim($this->make($route, $params), '*');
    }

    public function match($requestUrl, $method)
    {
        return $this->altoRouter->match($requestUrl, $method);
    }

}
