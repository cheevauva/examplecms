<?php

namespace ExampleCMS\Session;

class SessionOverFile extends SessionOverCache
{

    protected function getCacheName()
    {
        return 'sessionFile';
    }

}
