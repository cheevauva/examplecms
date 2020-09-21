<?php

namespace ExampleCMS;

class Storage
{

    public $module;

    /**
     * @var array
     */
    protected $entities = array();

    public function create($returnEntity = false)
    {
        $entity = $this->newEntity();
        $id = spl_object_hash($entity);

        $this->entities[$id] = $entity;

        if ($returnEntity) {
            return $entity;
        }

        return $id;
    }

    public function getEntity(array $row)
    {
        if (empty($this->entities[$row['id']])) {
            return null;
        }

        return $this->entities[$row['id']];
    }

    public function setEntity($entity)
    {
        $this->entities[$entity->get('id')] = $entity;
    }

    public function newEntity()
    {
        return $this->bundle->getModel('base');
    }

    public function removeEntity($entity)
    {
        unset($this->entities[$entity->get('id')]);
    }
}
