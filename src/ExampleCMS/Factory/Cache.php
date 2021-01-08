<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Cache extends Factory
{

    /**
     * @var \ExampleCMS\Filesystem
     */
    public $filesystem;

    /**
     * @var array
     */
    protected $adapters;

    /**
     * @var array
     */
    protected $meta;

    public function get($cache = null)
    {
        if (empty($cache)) {
            $cache = $this->config->get(['base', 'cache', 'engine']);
        }

        if (empty($this->adapters[$cache])) {
            $metadata = $this->loadMetadata($cache);
            $settings = $this->loadSettings($cache);
            $options = array_merge($metadata, $settings);

            $adapter = $this->container->create($metadata['adapter']);
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
        if (empty($this->meta)) {
            $this->meta = $this->filesystem->loadAsPHP('cache/metadata/application/Caches.php');
        }

        if (!empty($this->meta[$cache])) {
            return $this->meta[$cache];
        }

        return [];
    }

}
