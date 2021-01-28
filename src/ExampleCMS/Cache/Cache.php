<?php

namespace ExampleCMS\Cache;

abstract class Cache
{

    /**
     * @var \ExampleCMS\Contract\Factory\Cache
     */
    public $cacheFactory;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    public function __invoke()
    {
        return $this->cacheFactory->get($this->config->get('base.cache.engine'));
    }

}
