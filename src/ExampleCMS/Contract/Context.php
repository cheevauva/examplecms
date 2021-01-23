<?php

namespace ExampleCMS\Contract;

interface Context
{

    /**
     * @param string $attribute
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
     * @param array $attribute
     */
    public function withAttributes(array $attributes);
}
