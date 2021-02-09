<?php

namespace ExampleCMS\Factory;

class Query extends Factory implements \ExampleCMS\Contract\Factory\Query
{

    public function get($id, \ExampleCMS\Contract\Module $module)
    {
        return $this->builder->make($module->getComponentIdByAlias('queries.' . $id), [
            $module
        ]);
    }

}
