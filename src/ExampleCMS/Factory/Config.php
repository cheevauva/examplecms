<?php

namespace ExampleCMS\Factory;

class Config implements \ExampleCMS\Contract\Factory\Config
{

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var \Psr\Container\ContainerInterface
     */
    public $container;

    public function __construct($metadata)
    {
        $this->metadata = $metadata;
    }

    public function get($id, array $options = [])
    {
        return $this->container->get($this->metadata[$id]);
    }

}
