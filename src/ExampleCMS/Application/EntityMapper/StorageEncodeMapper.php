<?php

namespace ExampleCMS\Application\EntityMapper;

class StorageEncodeMapper extends EntityMapper
{

    public function execute($data = null)
    {
        return $this->entity->attributes();
    }

}
