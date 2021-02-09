<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Factory;

class Router extends Factory implements \ExampleCMS\Contract\Factory\Router
{

    /**
     * @var \ExampleCMS\Contract\Config 
     */
    public $config;

    public function get($id)
    {
        /** @var \ExampleCMS\Router $router */
        $router = $this->builder->make('router');
        $router->setRoutes($this->getRoutes($id));

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
