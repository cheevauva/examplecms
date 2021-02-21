<?php

namespace ExampleCMS\Module\Installer\Query;

trait CacheTrait
{

    /**
     * @var \ExampleCMS\Contract\Cache\Adapter
     */
    public $cache;

    protected function get($name, $default = null)
    {
        return $this->cache->get('installer:' . $name) ?: $default;
    }

    protected function set($name, $value)
    {
        $this->cache->set('installer:' . $name, $value);
    }

}
