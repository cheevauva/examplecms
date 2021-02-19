<?php

namespace ExampleCMS\Factory;

class Mapper extends Factory implements \ExampleCMS\Contract\Factory\Mapper
{

    public function get($id, \ExampleCMS\Contract\Module $module)
    {
        return $this->builder->make($module->getComponentIdByAlias('mapper.' . $id));
    }
    
    public function getByMeta(array $meta, \ExampleCMS\Contract\Module $module)
    {
        $id = $meta['component'];
        
        return $this->builder->make($module->getComponentIdByAlias('mapper.' . $id), [
            $meta,
        ]);
    }

}
