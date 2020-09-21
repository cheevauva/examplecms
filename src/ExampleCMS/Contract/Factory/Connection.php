<?php

namespace ExampleCMS\Contract\Factory;

interface Connection
{

    /**
     * @param string $module
     * @param string $connection
     * @return \ExampleCMS\Contract\Connection
     */
    public function get($module, $connection);
}
