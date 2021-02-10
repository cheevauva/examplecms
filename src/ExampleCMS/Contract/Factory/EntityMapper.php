<?php

namespace ExampleCMS\Contract\Factory;

interface EntityMapper
{

    /**
     * @param string $id
     * @param \ExampleCMS\Contract\Module $module
     * @return \ExampleCMS\Contract\Application\EntityMapper
     */
    public function get($id, \ExampleCMS\Contract\Application\Entity $module);
}
