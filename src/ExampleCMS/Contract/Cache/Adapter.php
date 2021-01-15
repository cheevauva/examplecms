<?php

namespace ExampleCMS\Contract\Cache;

interface Adapter
{

    public function get($key);

    public function set($key, $value);
}
