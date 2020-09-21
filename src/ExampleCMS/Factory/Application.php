<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Application implements \ExampleCMS\Contract\Container\UseServiceLocator
{

    /**
     * @var \ExampleCMS\Container\ServiceLocator 
     */
    protected $container;

    public function get($application)
    {
        $app = $this->container->get($application);
        $app->prepare();
        
        return $app;
    }

    public function setContainer(\ExampleCMS\Container\ServiceLocator $container)
    {
        $this->container = $container;
    }

}
