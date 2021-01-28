<?php

namespace ExampleCMS\Session;

abstract class SessionOverCache extends Session
{

    /**
     * @var \ExampleCMS\Contract\Factory\Cache
     */
    public $cacheFactory;

    /**
     * @var \ExampleCMS\Contract\Cache\Adapter 
     */
    protected $cache;

    protected function getCache()
    {
        if (!$this->cache) {
            $this->cache = $this->cacheFactory->get($this->getCacheName());
        }

        return $this->cache;
    }

    protected function readFromStorage()
    {
        return $this->getCache()->get($this->sessionId);
    }

    protected function writeToStorage()
    {
        $this->getCache()->set($this->sessionId, $this->session);
    }

    abstract protected function getCacheName();
}
