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
        $id = sprintf('ExampleCMS\Session\%s', ucfirst($id));
        
        return $this->builder->make($id);
    }

}
