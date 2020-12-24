<?php

namespace ExampleCMS;

use ExampleCMS\CommandBus\MiddlewareBus;

class Application
{

    /**
     * @var array
     */
    protected $middlewares = [];

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     * @var \Psr\Container\ContainerInterface
     */
    public $container;
    public $bootstrap;

    protected function getMiddlewares()
    {
        $appName = $this->bootstrap->getAppName();

        $metadata = $this->metadata->get(['applications', $appName]);
        $middlewares = array_flip($metadata['middleware']);

        ksort($middlewares);

        return array_values($middlewares);
    }

    public function run($request, $response)
    {
        $middlewares = $this->getMiddlewares();

        $bus = new MiddlewareBus($middlewares);
        $bus->container = $this->container;

        return $bus->run($request, $response);
    }

}
