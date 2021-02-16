<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Factory;

class Middleware extends Factory implements \ExampleCMS\Contract\Factory\Middleware
{

    public function get($id): \Psr\Http\Server\MiddlewareInterface
    {
        return $this->builder->make($id);
    }

    public function getByMeta($meta): \Psr\Http\Server\MiddlewareInterface
    {
        return $this->builder->make($meta['component'], [
            $meta
        ]);
    }

}
