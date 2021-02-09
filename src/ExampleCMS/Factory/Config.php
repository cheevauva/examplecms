<?php

namespace ExampleCMS\Factory;

class Config implements \ExampleCMS\Contract\Factory\Config
{

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var \ExampleCMS\Contract\ComponentBuilder
     */
    public $builder;

    public function __construct($metadata)
    {
        $this->metadata = $metadata;
    }

    public function get($id, array $options = [])
    {
        return $this->builder->make($this->metadata[$id], $options);
    }

}
