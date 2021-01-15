<?php

namespace ExampleCMS\Cache\Adapter;

abstract class Adapter implements \ExampleCMS\Contract\Cache\Adapter
{

    /**
     * @var \ExampleCMS\Contract\Config 
     */
    public $config;

    /**
     * @var array
     */
    protected $options;

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

}
