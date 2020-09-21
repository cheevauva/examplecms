<?php

namespace ExampleCMS\Cache;

class Memcached extends Basic
{

    /**
     * @var \ExampleCMS\Contact\Config
     */
    public $config;

    public function __construct()
    {
        $this->memcached = new \Memcached();
        $this->memcached->addServer('localhost', 11211);
    }

    public function get($key)
    {
        return $this->memcached->get($key);
    }

    public function set($key, $value)
    {
        $this->memcached->set($key, $value);
    }
}
