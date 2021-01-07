<?php

namespace ExampleCMS;

class Router
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
     * @return array
     */
    public function setRoutes(array $routes)
    {
        foreach ($routes as $routeName => $route) {
            $this->altoRouter->map($route['method'], $route['route'], $route['target'], $routeName);
        }
    }
    
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function make($route, array $params = array())
    {
        return $this->baseUrl . $this->altoRouter->generate($route, $params);
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
