<?php

namespace ExampleCMS\Factory;

class Mapper extends Factory implements \ExampleCMS\Contract\Factory\EntityMapper
{

    public function get($id, \ExampleCMS\Contract\Application\Entity $entity)
    {
        $module = $entity->getModule();
        
        return $this->builder->make($module->getComponentIdByAlias('mappers.' . $id), [
            $entity
        ]);
    }

}
