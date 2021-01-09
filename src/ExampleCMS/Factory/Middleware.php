<?php

namespace ExampleCMS\Factory;

class Middleware extends Factory
{

    public function get($id)
    {
        return $this->container->create($id);
    }

}
