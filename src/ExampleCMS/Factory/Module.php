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
     * @var array
     */
    protected $metadataModules;

    public function get($id)
    {
        if (empty($this->metadataModules)) {
            $this->metadataModules = $this->metadata->get(['modules']);
        }

        if (empty($this->metadataModules[$id])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('module "%s" is not defined', $id));
        }

        $component = \ExampleCMS\Module::class;

        if (!empty($this->metadataModules[$id]['component'])) {
            $component = $this->metadataModules[$id]['component'];
        }

        /** @var \ExampleCMS\Module $module */
        $module = $this->builder->make($component, [
            $id
        ]);

        return $module;
    }

}
