<?php

namespace ExampleCMS\Contract\Factory;

interface Query
{
    /**
     * @param string $id
     * @param \ExampleCMS\Contract\Module $module
     * @return \ExampleCMS\Contract\Application\Query
     */
    public function get($id, \ExampleCMS\Contract\Module $module);
}
