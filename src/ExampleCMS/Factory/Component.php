<?php

namespace ExampleCMS\Factory;

class Component extends Factory implements \ExampleCMS\Contract\Factory\Component
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

        if (empty($this->componentMetadata[$moduleName][$id])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('component "%s" not found for module "%s"', $id, $module->getName()));
        }

        return $this->builder->make($this->componentMetadata[$moduleName][$id]);
    }

}
