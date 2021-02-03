<?php

namespace ExampleCMS\Contract\Factory;

interface Mapper
{

    /**
     * @param string $id
     * @param \ExampleCMS\Contract\Module $module
     * @return \ExampleCMS\Contract\Application\Mapper
     */
    public function get($id, \ExampleCMS\Contract\Module $module);
}
