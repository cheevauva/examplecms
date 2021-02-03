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

    public function setName($module)
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

}
