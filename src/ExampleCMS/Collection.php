<?php

namespace ExampleCMS;

class Collection implements \Iterator, \Countable
{

    /**
     * @var array
     */
    public $models = array();
    public $query;

    public function count($mode = 'COUNT_NORMAL')
    {
        return count($this->models);
    }

    public function current()
    {
        return current($this->models);
    }

    public function key()
    {
        return key($this->models);
    }

    public function next()
    {
        next($this->models);
    }

    public function rewind()
    {
        reset($this->models);
    }

    public function valid()
    {
        $key = key($this->models);
        return ($key !== null && $key !== false);
    }

    public function add($model)
    {
        $this->models[] = $model;
    }

    public function get($name)
    {
        switch ($name) {
            case 'count':
                return $this->count();
                break;
        }
    }
}
