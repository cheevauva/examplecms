<?php

namespace ExampleCMS\Factory;

class Action extends Factory implements \ExampleCMS\Contract\Factory\Action
{

    public function get($id, \ExampleCMS\Contract\Module $module)
    {
        $metadata = [];

        if (!is_string($id)) {
            $metadata = $id;
            $id = $metadata['component'];
        }
        
        return $this->builder->make($module->getComponentIdByAlias('actions.' . $id), [
            $module,
            $metadata
        ]);
    }

}
