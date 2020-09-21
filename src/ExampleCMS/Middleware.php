<?php

namespace ExampleCMS;

class Middleware
{

    protected $index = -1;
    protected $middleware = array();
    public $container;

    public function setMiddleware($middleware)
    {
        $this->middleware = $middleware;
    }

    public function run($request, $response)
    {
        $this->index ++;
        $runner = array($this, 'run');

        if (empty($this->middleware[$this->index])) {
            return $response;
        }

        $middleware = $this->container->get($this->middleware[$this->index]);

        return $middleware($request, $response, $runner);
    }

}
