<?php

namespace ExampleCMS\Application\EntityMapper;

class ModelBaseFromStorage extends EntityMapper
{

    public function execute($data = null)
    {
        $this->entity->pull($data);
    }

}
