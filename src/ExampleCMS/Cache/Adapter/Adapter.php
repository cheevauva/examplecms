<?php

namespace ExampleCMS\Cache\Adapter;

abstract class Adapter
{

    /**
     * @var \ExampleCMS\Contact\Config
     */
    public $config;

    /**
     * @var array
     */
    protected $options;

    abstract public function get($key);

    abstract public function set($key, $value);

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

}
