<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Factory;

class Router
{

    /**
     * @var \ExampleCMS\Container 
     */
    public $container;

    /**
     * @var \ExampleCMS\Contract\Config 
     */
    public $config;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     * @var array 
     */
    protected $routers = [];

    public function get($application)
    {
        if (!empty($this->routers[$application])) {
            return $this->routers[$application];
        }

        /** @var \ExampleCMS\Router $router */
        $router = $this->container->create('ExampleCMS\Router');
        $router->setRoutes($this->getRoutes($application));

        $this->routers[$application] = $router;

        return $router;
    }

    protected function getRoutes($application)
    {
        if ($this->config->get('base.setup')) {
            $application .= 'setup';
        }

        return $this->metadata->get(['routes', $application]);
    }

}
