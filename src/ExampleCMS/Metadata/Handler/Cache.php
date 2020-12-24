<?php

namespace ExampleCMS\Metadata\Handler;

class Cache extends Basic
{

    public $handler;
    public $cache;

    public function get(array $path)
    {
        $key = 'metadata:' . $this->handler->getType() . '.' . implode('.', $path);

        $cacheData = $this->cache->get($key);

        if ($cacheData) {
            return $cacheData;
        }

        $data = $this->handler->get($path);
        
        $this->cache->set($key, $data);

        return $data;
    }
}
