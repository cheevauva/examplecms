<?php

namespace ExampleCMS\Module\Installer\Query;

class FindFormModel extends \ExampleCMS\Application\Query\Query implements \ExampleCMS\Contract\Module\Installer\Query\FindFormModel
{

    public function fetch(array $params = [])
    {
        $model = $this->entity($params[static::FORM]);
        $model->doMappingFromDataToModel($params[static::FORMS]);

        return $model;
    }

}
