<?php

namespace ExampleCMS\Cache\Adapter;

class Memory extends Adapter
{

    /**
     * @var array
     */
    protected $data = [];

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
