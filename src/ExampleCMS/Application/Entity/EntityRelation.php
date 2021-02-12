<?php

namespace ExampleCMS\Application\Entity;

use ExampleCMS\Contract\Application\Entity;
use ExampleCMS\Contract\Application\Entity\EntityRelation;

class EntityRelation extends EntityPersistent implements EntityRelation
{

    /**
     * @var Entity 
     */
    protected $currentEntity;

    /**
     * @var Entity 
     */
    protected $relatedEntity;

    public function current(Entity $entity)
    {
        $this->currentEntity = $entity;
    }

    public function related(Entity $entity)
    {
        $this->relatedEntity = $entity;
    }

    public function markAsDeleted()
    {
        $this->attribute('deleted', true);
    }

    public function markAsUndeleted()
    {
        $this->attribute('deleted', false);
    }

}
