<?php

namespace ExampleCMS\Contract\Application;

use ExampleCMS\Contract\Module;

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

    public function attribute($attribute);

    public function entityName();

    public function apply();

    /**
     * @param string $relation
     * @return Query
     */
    public function relation($relation);
}
