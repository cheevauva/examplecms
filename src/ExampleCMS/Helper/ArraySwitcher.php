<?php

namespace ExampleCMS\Helper;

class ArraySwitcher implements \ArrayAccess
{

    protected $data;
    protected $default = [];

    public function __construct($data, $default = [])
    {
        $this->data = $data;
        $this->default = $default;
    }

    public function offsetExists($offset)
    {
        if (isset($this->data[$offset])) {
            return true;
        } else {
            return isset($this->default[$offset]);
        }
    }

    public function offsetGet($offset)
    {
        if (isset($this->data[$offset])) {
            return $this->data[$offset];
        }

        return isset($this->default[$offset]) ? $this->default[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        // nothing
    }

    public function offsetUnset($offset)
    {
        // nothing
    }

}
