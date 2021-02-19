<?php

namespace ExampleCMS\Factory;

class QueryWithEntity extends Factory implements \ExampleCMS\Contract\Factory\QueryWithEntity
{

    public function get($id, $module, \ExampleCMS\Contract\Application\Entity $entity): \ExampleCMS\Contract\Application\Query
    {
        return $this->builder->make($module->getComponentIdByAlias('queries.' . $id), [
            $module,
            $entity
        ]);
    }

}
