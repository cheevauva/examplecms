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

    /**
     * @var string 
     */
    protected $appName;

    public function setAppName($appName)
    {
        $this->appName = $appName;
    }

    protected function getMiddlewares($application)
    {
        $metadata = $this->metadata->get(['applications', $application]);
        $middlewares = array_flip($metadata['middleware']);

        ksort($middlewares);

        return array_values($middlewares);
    }

    public function run($request, $response)
    {
        $middlewares = $this->getMiddlewares($request->getAttribute('application'));

        $bus = new MiddlewareBus($middlewares);
        $bus->container = $this->container;

        return $bus->run($request, $response);
    }

}
