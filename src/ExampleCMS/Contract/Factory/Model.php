<?php

namespace ExampleCMS\Contract\Factory;

interface Model
{

    /**
     * @param string $id
     * @param \ExampleCMS\Contract\Module $module
     * @return \ExampleCMS\Contract\Application\Model
     */
    public function get($id, \ExampleCMS\Contract\Module $module);
}
