<?php

namespace ExampleCMS\Cache;

class File extends Cache
{

    public function __invoke()
    {
        return $this->cacheFactory->get('file');
    }

}
