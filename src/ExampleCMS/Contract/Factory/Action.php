<?php

namespace ExampleCMS\Contract\Factory;

interface Action
{

    /**
     * @param string $id
     * @param \ExampleCMS\Contract\Module $module
     * @return \ExampleCMS\Contract\Application\Action
     */
    public function get($id, \ExampleCMS\Contract\Module $module);
}
