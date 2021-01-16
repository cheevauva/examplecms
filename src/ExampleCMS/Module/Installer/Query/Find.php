<?php

namespace ExampleCMS\Module\Installer\Query;

class Find extends \ExampleCMS\Application\Query\Query
{

    /**
     * @var \ExampleCMS\Contract\Factory\Cache
     */
    public $cacheFactory;

    public function fetch(array $params = array())
    {
        $install = $this->cacheFactory->get('fileInstaller')->get('options');

        if (empty($install)) {
            $install = [];
        }

        $model = $this->module->model('base');
        $model->fromArray($install);

        return $model;
    }

}
