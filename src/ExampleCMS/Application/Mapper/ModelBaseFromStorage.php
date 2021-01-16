<?php

namespace ExampleCMS\Application\Mapper;

class ModelBaseFromStorage implements \ExampleCMS\Contract\Application\Mapper
{

    public function execute(array $params)
    {
        /** @var \ExampleCMS\Contract\Application\Model $model */
        $model = $params[static::TO];
        $model->fromArray($params[static::TO]);
    }

}
