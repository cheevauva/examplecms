<?php

namespace ExampleCMS\Factory;

class Component extends Factory
{

    /**
     * @var array 
     */
    protected $componentMetadata = [];

    public function get($id, \ExampleCMS\Contract\Module $module)
    {
        $moduleName = $module->getName();

        if (!isset($this->componentMetadata[$moduleName])) {
            $this->componentMetadata[$moduleName] = $this->metadata->get(['components', $moduleName]);
        }

        return $this->container->get($this->componentMetadata[$moduleName][$id]);
    }

}
