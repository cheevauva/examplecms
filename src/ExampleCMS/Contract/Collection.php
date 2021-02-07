<?php

namespace ExampleCMS\Contract;

use ExampleCMS\Contract\Application\Entity;

interface Collection
{

    public function add(Entity $entity);
}
