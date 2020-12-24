<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ExampleCMS\Session;

class Memcached extends Session
{

    protected function readFromStorage()
    {
        return $this->cacheFactory->get('memcached')->get($this->sessionId);
    }

    protected function writeToStorage()
    {
        $this->cacheFactory->get('memcached')->set($this->sessionId, $this->session);
    }

}
