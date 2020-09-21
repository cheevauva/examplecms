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
     * @return mixed
     */
    public function get(array $path);
}
