<?php

namespace ExampleCMS\Contract\Factory;

interface Bundle
{

    /**
     * @param string $module
     * @return \ExampleCMS\Contract\Bundle
     */
    public function get($module);
}
