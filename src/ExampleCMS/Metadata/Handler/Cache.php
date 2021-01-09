<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Metadata\Handler;

class Cache extends Handler
{

    public $handler;

    /**
     * @var \ExampleCMS\Cache\Cache
     */
    public $cache;

    /**
     * @var \ExampleCMS\Config
     */
    public $config;

    /**
     * @var \ExampleCMS\Contract\Factory\Cache
     */
    public $cacheFactory;

    public function setMetadata(array $metadata)
    {
        parent::setMetadata($metadata);

        $this->component = $this->metadata['component'];

        $engine = null;

        if (!empty($this->metadata['cache']['engine'])) {
            $engine = $this->metadata['cache']['engine'];
        }

        $this->cache = $this->cacheFactory->get($engine);
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
