<?php

namespace ExampleCMS\Module\Installer\Query;

class Save
{

    const MODEL = 'model';
    const REQUEST = 'request';

    /**
     * @var \ExampleCMS\Contract\Factory\Cache
     */
    public $cacheFactory;
    protected $module;

    public function execute(array $params = [])
    {
        $model = $params[static::MODEL];

        $this->cacheFactory->get('fileInstaller')->set('options', $model->toArray());
    }

    public function setModule($module): void
    {
        $this->module = $module;
    }

}
