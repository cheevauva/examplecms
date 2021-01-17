<?php

namespace ExampleCMS\Factory;

class Config extends Factory
{

    public function get($id, $options = [])
    {
        $map = [
            'local' => \ExampleCMS\Config\Local::class,
            'database' => \ExampleCMS\Config\Database::class,
        ];

        return $this->container->get($map[$id]);
    }

}
