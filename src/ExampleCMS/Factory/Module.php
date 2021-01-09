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
     * @var \ExampleCMS\Module[]
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

        /** @var \ExampleCMS\Module $module */
        $module = $this->container->get('*ExampleCMS\Module');
        $module->setModule($id);

        $this->modules[$id] = $module;

        return $module;
    }

}
