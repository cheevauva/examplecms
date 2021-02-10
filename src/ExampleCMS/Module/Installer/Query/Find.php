<?php

namespace ExampleCMS\Module\Installer\Query;

class Find extends \ExampleCMS\Application\Query\Query
{

    /**
     * @var \ExampleCMS\Contract\Cache\Adapter
     */
    public $cache;

    public function fetch(array $params = array())
    {
        $install = $this->cache->get('installer:entity');

        if (empty($install)) {
            $install = [];
        }

        $entity = $this->entity('base');
        $entity->pull($install);

        return $entity;
    }

}
