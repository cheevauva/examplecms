<?php

namespace ExampleCMS\Factory;

class Mapper extends Factory implements \ExampleCMS\Contract\Factory\Mapper
{

    public function get($id, \ExampleCMS\Contract\Module $module)
    {
        return $this->builder->make($module->getComponentIdByAlias('mappers.' . $id), [
            $module
        ]);
    }

}
