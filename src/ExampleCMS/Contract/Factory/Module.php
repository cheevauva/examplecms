<?php

namespace ExampleCMS\Contract\Factory;

interface Module
{

    /**
     * @param string $module
     * @return \ExampleCMS\Contract\Module
     */
    public function get($id);
}
