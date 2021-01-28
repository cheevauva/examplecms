<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Metadata\Handler;

class Cache extends Handler
{

    public $handler;

    /**
     * @var \ExampleCMS\Contract\Cache\Adapter
     */
    public $cache;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    /**
     * @var \ExampleCMS\Contract\Metadata\Handler
     */
    protected $component;

    public function setMetadata(array $metadata)
    {
        parent::setMetadata($metadata);

        $this->component = $this->metadata['component'];
    }

    public function get(array $path)
    {
        $key = 'metadata:' . $this->component->getName() . '.' . implode('.', $path);

        $cacheData = $this->cache->get($key);

        if (!is_null($cacheData)) {
            return $cacheData;
        }

        $data = $this->component->get($path);

        $this->cache->set($key, $data);

        return $data;
    }

}
