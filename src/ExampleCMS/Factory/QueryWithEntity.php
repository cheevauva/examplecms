<?php

namespace ExampleCMS\Factory;

class QueryWithEntity extends Factory implements \ExampleCMS\Contract\Factory\QueryWithEntity
{

    public function get($id, \ExampleCMS\Contract\Application\Entity $entity): \ExampleCMS\Contract\Application\Query
    {
        $module = $entity->getModule();

        return $this->builder->make($module->getComponentIdByAlias('queries.' . $id), [
            $module,
            $entity
        ]);
    }

}
