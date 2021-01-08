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
     * @var array
     */
    protected $metadataModules;

    public function get($module)
    {
        if (empty($this->metadataModules)) {
            $this->metadataModules = $this->metadata->get(['modules']);
        }

        if (isset($this->modules[$module])) {
            return $this->modules[$module];
        }

        if (empty($this->metadataModules[$module])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('module "%s" is not defined', $module));
        }

        /** @var $moduleObject \ExampleCMS\Contract\Module */
        $moduleObject = $this->container->create('ExampleCMS\Module');
        $moduleObject->init($module);

        $this->modules[$module] = $moduleObject;


        return $moduleObject;
    }

}
