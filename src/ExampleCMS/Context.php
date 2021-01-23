<?php

namespace ExampleCMS;

class Context implements \ExampleCMS\Contract\Context
{

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getAttribute($attribute, $default = null)
    {
        if (!array_key_exists($attribute, $this->attributes)) {
            return $default;
        }

        return $this->attributes[$attribute];
    }

    public function hasAttribute($attribute)
    {
        return isset($this->attributes[$attribute]);
    }

    public function withAttribute($attribute, $value)
    {
        $context = clone $this;
        $context->attributes[$attribute] = $value;

        return $context;
    }

    public function withoutAttribute($attribute)
    {
        if (!isset($this->attributes[$attribute])) {
            return clone $this;
        }

        $context = clone $this;

        unset($context->attributes[$attribute]);

        return $context;
    }

    public function withAttributes($attributes)
    {
        $context = $this;

        foreach ($attributes as $attribute => $value) {
            $context = $context->withAttribute($attribute, $value);
        }

        return $context;
    }

}
