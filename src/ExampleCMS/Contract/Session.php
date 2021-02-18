<?php

namespace ExampleCMS\Contract;

interface Session
{

    /**
     * @return string
     */
    public function getSessionId();
    
    public function setSessionId($sessionId);
    
    public function get($path, $default = null);

    public function write();
}
