<?php

namespace ExampleCMS\Contract;

interface Session
{

    /**
     * @return string
     */
    public function getSessionId();

    public function write();
}
