<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Router implements \ExampleCMS\Contract\Container\UseServiceLocator
{
    /**
     * @var \ExampleCMS\Container\ServiceLocator 
     */
    protected $container;

    public function get($router)
    {
        return $this->container->get($router);
    }

    public function setContainer(\ExampleCMS\Container\ServiceLocator $container)
    {
        $this->container = $container;
    }

}
