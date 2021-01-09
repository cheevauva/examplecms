<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Contract\Metadata;

interface Handler
{

    /**
     * @param array $metadata
     */
    public function setMetadata(array $metadata);

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
