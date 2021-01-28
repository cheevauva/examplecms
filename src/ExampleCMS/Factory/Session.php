<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Session extends Factory implements \ExampleCMS\Contract\Factory\Session
{

    public function get($id)
    {
        return $this->container->get($id);
    }

}
