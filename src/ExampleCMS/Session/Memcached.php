<?php

namespace ExampleCMS\Session;

class Memcached extends Session
{

    protected function readFromStorage()
    {
        return $this->cacheFactory->get('memcachedSession')->get($this->sessionId);
    }

    protected function writeToStorage()
    {
        $this->cacheFactory->get('memcachedSession')->set($this->sessionId, $this->session);
    }

}
