<?php

namespace ExampleCMS\Module\Installer\Query;

class FindById extends \ExampleCMS\Application\Query\Query implements \ExampleCMS\Contract\Application\Query\FindById
{

    use CacheTrait;

    public function fetch(array $params = array())
    {
        $id = $params[static::ID] ?? null;

        if (empty($id)) {
            throw new \Exception('id is required');
        }
        $install = $this->get($id);
        $install['id'] = $id;
 
        $entity = $this->entity('base');
        $entity->decode($install ?? []);

        return new \ExampleCMS\Application\ResultSet\Entity($entity);
    }

}
