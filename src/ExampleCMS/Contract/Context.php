<?php

namespace ExampleCMS\Contract;

use ExampleCMS\Contract\Entity;
use ExampleCMS\Contract\Collection;

interface Context
{

    /**
     * @param string $attribute
     * @return Context
     */
    public function withAttribute($attribute, $value);

    /**
     * @param string $attribute
     * @param mixed $default
     */
    public function getAttribute($attribute, $default = null);

    /**
     * @param string $attribute
     */
    public function hasAttribute($attribute);

    /**
     * @param string $attribute
     */
    public function withoutAttribute($attribute);

    /**
     * @return  array
     */
    public function getAttributes();

    /**
     * @param array $attributes
     */
    public function withAttributes(array $attributes);

    /**
     * @param string $name
     * @param Entity $value
     */
    public function withEntity($name, Entity $value);

    /**
     * @param string $name
     * @return bool
     */
    public function hasEntity($name);

    /**
     * @return Entity
     */
    public function getEntity($name);

    /**
     * @param string $name
     * @param Collection $collection
     */
    public function withCollection($name, Collection $collection);

    /**
     * @param string $name
     * @return bool
     */
    public function hasCollection($name);

    /**
     * @return Collection
     */
    public function getCollection($name);
}
