<?php

namespace ExampleCMS\Module\Installer\Query;

use ExampleCMS\Contract\Module\Installer\Query\FindFormModel as FindFormModelInterface;

class FindFormModel extends \ExampleCMS\Application\Query\Query implements FindFormModelInterface
{

    public function fetch(array $params = [])
    {
        $model = $this->entity($params[static::FORM]);
        $model->doMappingFromDataToModel($params[static::FORMS]);

        return $model;
    }

}
