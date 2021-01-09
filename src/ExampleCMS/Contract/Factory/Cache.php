<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Contract\Factory;

interface Cache
{

    /**
     * @param string|null $cache
     * @return \ExampleCMS\Contract\Cache\Adapter
     */
    public function get($cache = null);
}
