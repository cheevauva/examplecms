<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Entity;

abstract class Entity implements \ExampleCMS\Contract\Application\Entity
{

    /**
     * @var \ExampleCMS\Contract\Factory\Mapper 
     */
    public $mapperFactory;

    /**
     * @var \ExampleCMS\Contract\Module
     */
    protected $module;

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var array
     */
    protected $meta;

    protected const META_MAPPER_DECODE = 'mapper_encode';
    protected const META_MAPPER_ENCODE = 'mapper_decode';
    protected const META_ENITY_NAME = 'name';

    public function getModule()
    {
        return $this->module;
    }

    public function __construct(\ExampleCMS\Contract\Module $module, array $metadata)
    {
        $this->module = $module;
        $this->meta = $metadata;

        if (empty($this->meta[static::META_MAPPER_ENCODE])) {
            $this->meta[static::META_MAPPER_ENCODE] = $this->encodeMapperName();
        }

        if (empty($this->meta[static::META_MAPPER_DECODE])) {
            $this->meta[static::META_MAPPER_DECODE] = $this->decodeMapperName();
        }
    }

    public function getEntityName()
    {
        return $this->meta[static::META_ENITY_NAME];
    }

    protected abstract function encodeMapperName();

    protected abstract function decodeMapperName();

    public function __debugInfo()
    {
        return [
            'attributes' => $this->attributes
        ];
    }

    public function getMeta()
    {
        return $this->meta;
    }

    public function pull($data)
    {
        if (is_array($data)) {
            $attributes = $data;
        }

        if ($data instanceof \ExampleCMS\Contract\Application\Entity) {
            $attributes = $data->attributes();
        }

        foreach ($attributes as $attribute => $value) {
            $this->attributes[$attribute] = $value;
        }
    }

    /**
     * @param string $name
     * @return \ExampleCMS\Contract\Application\EntityMapper
     */
    protected function mapper($name)
    {
        return $this->mapperFactory->get($name, $this);
    }

    public function decode($data)
    {
        $this->mapper($this->meta[static::META_MAPPER_DECODE])->execute($data);
    }

    public function encode()
    {
        return $this->mapper($this->meta[static::META_MAPPER_ENCODE])->execute();
    }

    public function attributes(array $attributes = null)
    {
        if (is_array($attributes)) {
            $this->attributes = $attributes;
        }

        return $this->attributes;
    }

    public function isEmpty($attribute)
    {
        return empty($this->attributes[$attribute]);
    }

    public function isNotEmpty($attribute): bool
    {
        return !empty($this->attributes[$attribute]);
    }

    public function attribute($attribute)
    {
        return $this->attributes[$attribute];
    }

}
