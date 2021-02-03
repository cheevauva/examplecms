<?php

namespace ExampleCMS\Module\Installer\Query;

class FindFormModel extends \ExampleCMS\Application\Query\Query
{

    const REQUEST = 'request';
    const FORM = 'form';

    public function fetch(array $params = [])
    {
        /* @var $request \Psr\Http\Message\ServerRequestInterface */
        $request = $params[static::REQUEST];

        $model = $this->model($params[static::FORM]);
        $model->doMappingFromDataToModel($request);

        return $model;
    }

}
