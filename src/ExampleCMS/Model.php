<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS;

class Model implements \ExampleCMS\Contract\Model
{

    /**
     * @var \ExampleCMS\Contract\Module
     */
    public $module;

    /**
     * @var array
     */
    protected $attributes = array();

    /**
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    public function setModule($module)
    {
        $this->module = $module;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get($name)
    {
        if (!isset($this->attributes[$name])) {
            return null;
        }

        return $this->attributes[$name];
    }

    public function fromArray(array $array)
    {
        $this->attributes = $array;
    }

    public function toArray()
    {
        return $this->attributes;
    }

    public function isNull()
    {
        return !$this->module || !$this->attributes;
    }

    public function reset()
    {
        $this->attributes = array();
    }

    public function __debugInfo()
    {
        return [
            'attributes' => $this->attributes
        ];
    }

}
