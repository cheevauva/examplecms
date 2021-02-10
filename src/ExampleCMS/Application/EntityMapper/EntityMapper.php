<?php

namespace ExampleCMS\Application\EntityMapper;

abstract class EntityMapper implements \ExampleCMS\Contract\Application\EntityMapper
{
    /**
     * @var \ExampleCMS\Contract\Application\Entity
     */
    protected $entity;

    public function __construct($entity)
    {
        $this->entity = $entity;
    }

}
