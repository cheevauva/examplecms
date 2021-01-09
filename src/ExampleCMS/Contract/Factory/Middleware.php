<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Contract\Factory;

interface Middleware
{

    /**
     * @param string $id
     * @return \Psr\Http\Server\MiddlewareInterface
     */
    public function get($id): \Psr\Http\Server\MiddlewareInterface;
}
