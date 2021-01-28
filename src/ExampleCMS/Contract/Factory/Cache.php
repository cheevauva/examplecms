<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Contract\Factory;

interface Cache
{

    /**
     * @param string $id
     * @return \ExampleCMS\Contract\Cache\Adapter
     */
    public function get($id);
}
