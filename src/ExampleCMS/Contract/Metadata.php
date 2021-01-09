<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Contract;

interface Metadata
{

    /**
     * @param array $path
     * @return array|\ArrayAccess
     */
    public function get(array $path);
}
