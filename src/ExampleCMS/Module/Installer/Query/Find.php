<?php

namespace ExampleCMS\Module\Installer\Query;

class Find
{

    const REQUEST = 'request';

    protected $module;
    public $cacheFactory;

    public function execute(array $params = [])
    {
        $install = $this->cacheFactory->get('fileInstaller')->get('options');

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
