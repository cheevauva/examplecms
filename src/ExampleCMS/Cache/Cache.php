<?php

namespace ExampleCMS\Cache;

class Cache implements \PDIC\InterfaceMediator
{

    /**
     * @var \ExampleCMS\Contract\Factory\Cache
     */
    public $cacheFactory;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    public function get()
    {
        return $this->cacheFactory->get($this->config->get('base.cache.engine'));
    }

}
