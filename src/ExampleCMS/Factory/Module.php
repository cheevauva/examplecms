<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Module extends Factory implements \ExampleCMS\Contract\Factory\Module
{

    /**
     * @var \ExampleCMS\Contract\Module[]
     */
    protected $modules;

    /**
     * @var array
     */
    protected $metadataModules;

    public function get($id)
    {
        if (empty($this->metadataModules)) {
            $this->metadataModules = $this->metadata->get(['modules']);
        }

        if (isset($this->modules[$id])) {
            return $this->modules[$id];
        }

        if (empty($this->metadataModules[$id])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('module "%s" is not defined', $id));
        }
        
        $component = \ExampleCMS\Module::class;
        
        if (!empty($this->metadataModules[$id]['component'])) {
            $component = $this->metadataModules[$id]['component'];
        } 

        /** @var \ExampleCMS\Module $module */
        $module = $this->container->get($component);
        $module->setName($id);

        $this->modules[$id] = $module;

        return $module;
    }

}
