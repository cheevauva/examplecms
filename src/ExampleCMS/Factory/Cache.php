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
    protected $meta;

    public function __construct($metadata)
    {
        $this->meta = $metadata;
    }

    public function get($id = null)
    {
        $metadata = $this->loadMetadata($id);
        $settings = $this->loadSettings($id);
        $options = array_merge($metadata, $settings);

        if (empty($metadata['adapter'])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('adapter is not define for "%s" cache', $id));
        }

        $adapter = $this->builder->make($metadata['adapter']);
        $adapter->setOptions($options);

        return $adapter;
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
