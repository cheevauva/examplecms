<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Application implements \PDIC\InterfaceUsePDICServiceLocator
{

    /**
     * @var \PDIC\ServiceLocator 
     */
    protected $container;

    public function get($application)
    {
        $app = $this->container->get($application);
        $app->prepare();

        return $app;
    }

    public function setPDICServiceLocatory(\PDIC\ServiceLocator $serviceLocator)
    {
        $this->container = $serviceLocator;
    }

}
