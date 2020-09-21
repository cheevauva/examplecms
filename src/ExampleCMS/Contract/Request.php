<?php

namespace ExampleCMS\Contract;

interface Request
{

    public function getPathInfo();

    public function getBasePath();

    public function getMethod();
    
    public function get($key, $default = null, $deep = false);
}
