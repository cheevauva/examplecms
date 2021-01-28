<?php

namespace ExampleCMS\Cache;

class Memcached extends Cache
{

    public function __invoke()
    {
        return $this->cacheFactory->get('memcached');
    }

}
