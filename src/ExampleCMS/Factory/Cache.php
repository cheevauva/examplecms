<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Cache extends Factory implements \ExampleCMS\Contract\Factory\Cache
{

    /**
     * @var \ExampleCMS\Contract\Filesystem
     */
    public $filesystem;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    /**
     * @var array
     */
    protected $adapters;

    /**
     * @var array
     */
    protected $meta;
    
    public function __construct($metadata)
    {
        $this->meta = $metadata;
    }

    public function get($cache = null)
    {
        if (empty($cache)) {
            $cache = $this->config->get(['base', 'cache', 'engine']);
        }

        if (empty($this->adapters[$cache])) {
            $metadata = $this->loadMetadata($cache);
            $settings = $this->loadSettings($cache);
            $options = array_merge($metadata, $settings);

            $adapter = $this->container->get($metadata['adapter']);
            $adapter->setOptions($options);

            $this->adapters[$cache] = $adapter;
        }

        return $this->adapters[$cache];
    }

    protected function loadSettings($cache)
    {
        $settings = $this->config->get(['base', 'cache', 'engines', $cache]);

        if (empty($settings)) {
            $settings = [];
        }

        return $settings;
    }

    protected function loadMetadata($cache)
    {
        if (!empty($this->meta[$cache])) {
            return $this->meta[$cache];
        }

        return [];
    }

}
