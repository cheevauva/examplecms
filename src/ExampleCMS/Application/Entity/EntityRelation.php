<?php

namespace ExampleCMS\Application\Entity;

use ExampleCMS\Contract\Application\Entity;
use ExampleCMS\Contract\Application\Entity\EntityRelation as EntityRelationInterface;

class EntityRelation extends EntityPersistent implements EntityRelationInterface
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

        $this->attribute('current_id', $entity->getId());
    }

    public function related(Entity $entity)
    {
        $this->relatedEntity = $entity;

        $this->attribute('related_id', $entity->getId());
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
