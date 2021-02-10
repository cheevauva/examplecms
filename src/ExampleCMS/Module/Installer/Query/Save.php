<?php

namespace ExampleCMS\Module\Installer\Query;

class Save extends \ExampleCMS\Application\Query\QueryWithEntity
{

    /**
     * @var \ExampleCMS\Contract\Cache\Adapter
     */
    public $cache;

    public function execute(array $params = [])
    {
        $this->cache->set('installer:entity', $this->entity->attributes());
    }

}
