<?php

namespace ExampleCMS\Session;

class File extends Session
{

    /**
     * @var \ExampleCMS\Contract\Factory\Cache
     */
    public $cacheFactory;

    protected function readFromStorage()
    {
        return $this->cacheFactory->get('fileSession')->get($this->sessionId);
    }

    protected function writeToStorage()
    {
        $this->cacheFactory->get('fileSession')->set($this->sessionId, $this->session);
    }

}
