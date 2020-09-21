<?php

namespace ExampleCMS\Cache;

class Basic
{

    protected $conters = array();

    public function counter($key)
    {
        if (!isset($this->conters[$key])) {
            $this->conters[$key] = 1;
        } else {
            $this->conters[$key] ++;
        }
    }

    public function __destruct()
    {
        //var_dump($this->conters);
    }
}
