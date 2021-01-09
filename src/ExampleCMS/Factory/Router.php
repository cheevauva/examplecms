<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Factory;

class Router extends Factory
{

    /**
     * @var \ExampleCMS\Contract\Config 
     */
    public $config;

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
        $router = $this->container->get('*ExampleCMS\Router');
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
