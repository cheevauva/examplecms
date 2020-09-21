<?php

namespace ExampleCMS;

class Cache implements \ExampleCMS\Contract\Container\Mediator
{

    /**
     * @var \ExampleCMS\Config
     */
    public $config;

    /**
     * @var \ExampleCMS\Contract\Factory\Cache
     */
    public $cacheFactory;

    public function get()
    {
        return $this->cacheFactory->get($this->config->get('base.cache.engine'));
    }

}
