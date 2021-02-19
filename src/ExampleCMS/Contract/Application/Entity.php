<?php

namespace ExampleCMS\Contract\Application;

use ExampleCMS\Contract\Application\Entity\EntityRelation;

interface Entity
{

    /**
     * @param mixed $data
     */
    public function decode($data);

    /**
     * @return mixed 
     */
    public function encode();

    public function pull($data);

    public function mapping(string $mapper, array $data = []);

    public function entityName();

    public function apply();

    /**
     * @param Entity $entity
     * @return EntityRelation
     */
    public function detach($relation, Entity $entity);

    /**
     * @param Entity $entity
     * @return EntityRelation
     */
    public function attach($relation, Entity $entity);

    /**
     * @return string
     */
    public function getId();

    public function isValid();
}
