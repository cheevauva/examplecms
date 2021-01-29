<?php

namespace ExampleCMS\Application\Mapper;

class ModelBaseToStorage implements \ExampleCMS\Contract\Application\Mapper
{

    public function execute(array $params)
    {
        /** @var \ExampleCMS\Contract\Application\Model $model */
        $model = $params[static::FROM];

        $params[static::TO] = $model->toArray();
    }

}
