<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Module extends Factory
{

    /**
     * @var array
     */
    protected $modules;

    /**
     * @var \ExampleCMS\Container;
     */
    public $container;

    public function get($module)
    {
        if (isset($this->modules[$module])) {
            return $this->modules[$module];
        }

        $modules = $this->metadata->get(['modules']);

        if (empty($modules[$module])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('module "%s" is not defined', $module));
        }

        /** @var $moduleObject \ExampleCMS\Contract\Module */
        $moduleObject = $this->container->create('ExampleCMS\Module');
        $moduleObject->init($module);

        $this->modules[$module] = $moduleObject;


        return $moduleObject;
    }

}
