<?php

namespace ExampleCMS;

use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface,
    Server\MiddlewareInterface
};

class Application implements RequestHandlerInterface, \ExampleCMS\Contract\Application
{

    /**
     * @var array
     */
    protected $middlewares = [];

    /**
     *
     * @var int
     */
    protected $index = -1;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     * @var \ExampleCMS\Factory\Middleware
     */
    public $middlewareFactory;

    /**
     * @var ResponseInterface 
     */
    public $response;

    protected function getMiddlewares($application)
    {
        $metadata = $this->metadata->get(['applications', $application]);
        $middlewares = array_flip($metadata['middleware']);

        ksort($middlewares);

        return array_values($middlewares);
    }

    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $this->middlewares = $this->getMiddlewares($request->getAttribute('application'));

        return $this->handle($request);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->index++;

        if (empty($this->middlewares[$this->index])) {
            return $this->response;
        }

        /** @var MiddlewareInterface $middleware */
        $middleware = $this->middlewareFactory->get($this->middlewares[$this->index]);

        return $middleware->process($request, $this);
    }

}
