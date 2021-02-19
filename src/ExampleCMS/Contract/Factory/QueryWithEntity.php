<?php

namespace ExampleCMS\Contract\Factory;

interface QueryWithEntity
{

    /**
     * @param string $id
     * @param \ExampleCMS\Contract\Application\Entity $entity
     * @return \ExampleCMS\Contract\Application\Query
     */
    public function get($id, $module, \ExampleCMS\Contract\Application\Entity $entity);
}
