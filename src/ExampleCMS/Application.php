<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS;

use \ExampleCMS\Contract\Context;
use Psr\Http\{
    Message\ServerRequestInterface,
    Message\ResponseInterface,
    Server\RequestHandlerInterface
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
     * @var \ExampleCMS\Contract\Factory\Middleware
     */
    public $middlewareFactory;

    /**
     * @var ResponseInterface 
     */
    public $response;

    /**
     * @var Context
     */
    public $context;

    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $metadata = $this->metadata->get(['application', $request->getAttribute('application')]);

        $middlewares = $this->prepareMiddlewares($metadata);

        $this->middlewares = array_values($middlewares);
        $this->contentType = $metadata['contentType'];

        return $this->handle($request->withAttribute('context', $this->context));
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->index++;

        if (empty($this->middlewares[$this->index])) {
            return $this->response->withHeader('Content-Type', $this->contentType);
        }

        $middleware = $this->middlewareFactory->getByMeta($this->middlewares[$this->index]);

        return $middleware->process($request, $this);
    }

    protected function prepareMiddlewares($metadata)
    {
        $middlewares = $metadata['middleware'];

        uasort($middlewares, function ($a, $b) {
            if ($a['order'] === $b['order']) {
                return 0;
            }

            return $a['order'] < $b['order'] ? -1 : 1;
        });

        return $middlewares;
    }

}
