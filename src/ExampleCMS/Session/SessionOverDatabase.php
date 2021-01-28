<?php

namespace ExampleCMS\Session;

class SessionOverMemcached extends SessionOverCache
{

    protected function getCacheName()
    {
        return 'sessionDatabase';
    }

}
