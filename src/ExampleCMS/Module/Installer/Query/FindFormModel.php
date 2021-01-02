<?php

namespace ExampleCMS\Module\Installer\Query;

class FindFormModel
{

    const REQUEST = 'request';
    const FORM = 'form';

    protected $module;
    public $cacheFactory;

    public function fetch(array $params = [])
    {
        $request = $params[static::REQUEST];
        $form = $params[static::FORM];

        $model = $this->module->form($form);
        $body = $request->getParsedBody();

        $data = [];

        if (isset($body[$form])) {
            $data = $body[$form];
        }

        $model->fromArray($data);

        return $model;
    }

    public function setModule($module): void
    {
        $this->module = $module;
    }

}
