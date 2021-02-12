<?php

namespace ExampleCMS\Contract\Application;

use ExampleCMS\Contract\Module;
use ExampleCMS\Contract\Application\Entity\EntityRelation;

interface Entity
{

    /**
     * @return Module
     */
    public function getModule();

    /**
     * @return array
     */
    public function getMeta();

    /**
     * @param mixed $data
     */
    public function decode($data);

    /**
     * @return mixed 
     */
    public function encode();

    /**
     * @param string $attribute
     * @return bool
     */
    public function isEmpty($attribute);

    /**
     * @param string $attribute
     * @return bool
     */
    public function isNotEmpty($attribute);

    public function pull($data);

    public function attributes(array $attributes = null);

    public function attribute($attribute, $value = null);

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
}
