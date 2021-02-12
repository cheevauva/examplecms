<?php

namespace ExampleCMS;

use ExampleCMS\Contract\Application\Entity;

class Collection extends \SplObjectStorage implements \ExampleCMS\Contract\Collection
{

    public function add(Entity $entity)
    {
        $this->attach($entity);
    }

}
