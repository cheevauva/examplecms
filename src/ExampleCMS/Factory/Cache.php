<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Cache implements \ExampleCMS\Contract\Container\UseServiceLocator
{

    /**
     * @var \ExampleCMS\Container\ServiceLocator 
     */
    protected $container;

    public function get($cache)
    {
        return $this->container->get($cache);
    }

    public function setContainer(\ExampleCMS\Container\ServiceLocator $container)
    {
        $this->container = $container;
    }

}
