<?php

namespace ExampleCMS\Cache;

class Memory
{

    /**
     * @var \ExampleCMS\Contact\Config
     */
    public $config;
    protected $data = array();

    public function get($key)
    {
        if (!isset($this->data[$key])) {
            return null;
        }

        return $this->data[$key];
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }
}
