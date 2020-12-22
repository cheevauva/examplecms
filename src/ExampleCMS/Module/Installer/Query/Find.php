<?php

namespace ExampleCMS\Module\Installer\Query;

class Find
{

    const REQUEST = 'request';

    protected $module;

    public function execute(array $params = [])
    {
        $request = $params[static::REQUEST];

        $session = $request->getAttribute('session');
        $install = $session->get('setup_settings');

        if (empty($install)) {
            $install = [];
        }

        $model = $this->module->model();
        $model->fromArray($install);
        
        return $model;
    }

    public function setModule($module): void
    {
        $this->module = $module;
    }

}
