<?php

namespace ExampleCMS\Metadata\Handler\Basic;

class MetadataArray implements \ArrayAccess, \Iterator
{

    protected $data;
    protected $default = array();

    public function __construct($data, $default = array())
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

    public function current()
    {
        return current($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function next()
    {
        return next($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }

    public function valid()
    {
        return current($this->data);
    }

}
