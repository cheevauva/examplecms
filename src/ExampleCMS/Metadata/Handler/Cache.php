<?php

namespace ExampleCMS\Metadata\Handler;

class Cache extends Basic
{

    public $handler;
    public $cache;

    public function get(array $path)
    {
        $cachePath = 'metadata:' . $this->handler->getType() . '.' . implode('.', $path);

        $cacheData = $this->cache->get($cachePath);

        if ($cacheData) {
            return $cacheData;
        }

        $data = $this->handler->get($path);

        $this->cache->set($cachePath, $data);

        return $data;
    }
}
