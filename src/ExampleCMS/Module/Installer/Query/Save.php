<?php

namespace ExampleCMS\Module\Installer\Query;

class Save extends \ExampleCMS\Application\Query\Query
{

    const MODEL = 'model';
    const REQUEST = 'request';

    /**
     * @var \ExampleCMS\Contract\Factory\Cache
     */
    public $cacheFactory;

    public function execute(array $params = [], $autoExecute = true)
    {
        $model = $params[static::MODEL];

        $this->cacheFactory->get('fileInstaller')->set('options', $model->toArray());
    }

}
