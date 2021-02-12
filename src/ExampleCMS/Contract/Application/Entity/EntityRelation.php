<?php

namespace ExampleCMS\Contract\Application\Entity;

use ExampleCMS\Contract\Application\Entity;

interface EntityRelation extends Entity
{

    public function current(Entity $entity);

    public function related(Entity $entity);

    public function markAsDeleted();

    public function markAsUndeleted();
}
