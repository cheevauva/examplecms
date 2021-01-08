<?php

namespace ExampleCMS\CommandBus;

class MiddlewareBus
{

    /**
     *
     * @var int
     */
    protected $index = -1;

    /**
     * @var array 
     */
    protected $middlewares = [];

    /**
     * @var \ExampleCMS\Factory\Middleware
     */
    public $middlewareFactory;

    public function setMiddlewares(array $middlewares)
    {
        $this->middlewares = $middlewares;
    }

    public function run($request, $response)
    {
        $this->index++;
        $runner = array($this, 'run');

        if (empty($this->middlewares[$this->index])) {
            return $response;
        }

        $middleware = $this->middlewareFactory->get($this->middlewares[$this->index]);

        return $middleware($request, $response, $runner);
    }

}
