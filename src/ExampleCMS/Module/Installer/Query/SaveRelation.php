<?php

namespace ExampleCMS\Module\Installer\Query;

class SaveRelation extends Save
{

    /**
     * @var \ExampleCMS\Contract\Cache\Adapter
     */
    public $cache;

    public function execute(array $params = [])
    {
        $key = 'installer:entity:items';
        
        $items = $this->cache->get($key) ?: [];

        $item = $this->entity->encode();

        if (!empty($item['deleted'])) {
            unset($items[$item['id']]);
        } else {
            $items[$item['id']] = $item;
        }
        
        $this->cache->set($key, $items);
    }

}
