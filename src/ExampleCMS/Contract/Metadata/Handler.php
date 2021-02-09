<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Contract\Metadata;

interface Handler
{


    /**
     * @param array $path
     * @return mixed
     */
    public function get(array $path);

    /**
     * @return string
     */
    public function getName();
}
