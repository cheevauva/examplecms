<?php

namespace ExampleCMS\Application\Entity;

class EntityRelation extends Entity implements \ExampleCMS\Contract\Application\Entity\EntityRelation
{

    const META_CURRENT_ID = 'id-current';
    const META_RELATED_ID = 'id-related';

    protected function applyQueryName()
    {
        return 'save-relation';
    }

    public function current(\ExampleCMS\Contract\Application\Entity $entity): void
    {
        $entity->identify(function ($value) {
            $this->attribute($this->meta[static::META_CURRENT_ID], $value);
        });
    }

    public function related(\ExampleCMS\Contract\Application\Entity $entity): void
    {
        $entity->identify(function ($value) {
            $this->attribute($this->meta[static::META_RELATED_ID], $value);
        });
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
