<?php

namespace ExampleCMS\Cache;

class Memory extends Cache
{

    public function __invoke()
    {
        return $this->cacheFactory->get('memory');
    }

}
