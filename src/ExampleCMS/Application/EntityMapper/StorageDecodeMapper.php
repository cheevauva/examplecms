<?php

namespace ExampleCMS\Application\EntityMapper;

class StorageDecodeMapper extends EntityMapper
{

    public function execute($data = null)
    {
        $this->entity->pull($data);
    }

}
