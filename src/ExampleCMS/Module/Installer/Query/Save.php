<?php

namespace ExampleCMS\Module\Installer\Query;

class Save extends \ExampleCMS\Application\Query\Query
{

    const MODEL = 'model';
    const REQUEST = 'request';

    /**
     * @var \ExampleCMS\Contract\Cache\Adapter
     */
    public $cache;

    public function execute(array $params = [], $autoExecute = true)
    {
        $model = $params[static::MODEL];

        $this->cache->set('installer:entity', $model->toArray());
    }

}
