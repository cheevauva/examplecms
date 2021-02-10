<?php

namespace ExampleCMS\Application\Query;

class QueryWithEntity extends Query
{
    /**
     * @var \ExampleCMS\Contract\Application\Entity 
     */
    protected $entity;

    public function __construct(\ExampleCMS\Contract\Module $module, \ExampleCMS\Contract\Application\Entity $entity)
    {
        $this->module = $module;
        $this->entity = $entity;
    }

}
