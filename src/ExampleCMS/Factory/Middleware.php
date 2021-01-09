<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Factory;

class Middleware extends Factory implements \ExampleCMS\Contract\Factory\Middleware
{

    public function get($id): \Psr\Http\Server\MiddlewareInterface
    {
        return $this->container->get('*' . $id);
    }

}
