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

    public function execute(array $params = [])
    {
        /* @var $entity \ExampleCMS\Contract\Application\Entity */
        $entity = $params[static::MODEL];

        $this->cache->set('installer:entity', $entity->attributes());
    }

}
