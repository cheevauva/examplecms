<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS;

class Module implements \ExampleCMS\Contract\Module
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    public function __construct($module)
    {
        $this->name = $module;
    }

    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @var array 
     */
    protected $componens = [];

    public function getComponentIdByAlias($alias)
    {
        $components = $this->getComponents();
        
        if (empty($components[$alias])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('component "%s" not found for module "%s"', $alias, $this->name));
        }

        return $components[$alias];
    }

    protected function getComponents()
    {
        if (!isset($this->components)) {
            $this->components = $this->metadata->get(['components', $this->name]);
        }

        return $this->components;
    }

}
