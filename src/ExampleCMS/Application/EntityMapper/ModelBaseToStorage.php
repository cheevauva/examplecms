<?php

namespace ExampleCMS\Application\EntityMapper;

class ModelBaseToStorage extends EntityMapper
{

    public function execute($data = null)
    {
        return $this->entity->toArray();
    }

}
