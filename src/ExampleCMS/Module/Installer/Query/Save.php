<?php

namespace ExampleCMS\Module\Installer\Query;

class Save
{

    const MODEL = 'model';
    const REQUEST = 'request';

    protected $module;

    public function execute(array $params = [])
    {
        $request = $params[static::REQUEST];
        $model = $params[static::MODEL];

        $session = $request->getAttribute('session');
        $session->set('setup_settings', $model->toArray());
        $session->set('language', $model->get('language'));
    }

    public function setModule($module): void
    {
        $this->module = $module;
    }

}
