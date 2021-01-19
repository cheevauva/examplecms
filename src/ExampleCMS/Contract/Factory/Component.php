<?php

namespace ExampleCMS\Contract\Factory;

interface Component
{

    /**
     * @param string $id
     * @param \ExampleCMS\Contract\Module $module
     * @return object
     */
    public function get($id, \ExampleCMS\Contract\Module $module);
}
