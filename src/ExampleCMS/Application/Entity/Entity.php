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
     * @var \ExampleCMS\Contract\Factory\EntityMapper 
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

    /**
     * @var array
     */
    protected $mappers = [];

    protected const META_MAPPER_DECODE = 'mapper_encode';
    protected const META_MAPPER_ENCODE = 'mapper_decode';
    protected const META_ENTITY_NAME = 'name';

    public function getModule()
    {
        return $this->module;
    }

    public function __construct(\ExampleCMS\Contract\Module $module, array $metadata)
    {
        $this->module = $module;
        $this->meta = $metadata;

        $this->meta[static::META_MAPPER_ENCODE] = $this->meta[static::META_MAPPER_ENCODE] ?? $this->encodeMapperName();
        $this->meta[static::META_MAPPER_DECODE] = $this->meta[static::META_MAPPER_DECODE] ?? $this->decodeMapperName();

        if (empty($this->meta[static::META_ENTITY_NAME])) {
            throw new \Exception(sprintf('%s undefined in metadata for %s', static::META_ENTITY_NAME, __CLASS__));
        }

        $this->meta[static::META_ENTITY_NAME] = $this->meta[static::META_ENTITY_NAME];
    }

    public function entityName()
    {
        return $this->meta[static::META_ENTITY_NAME];
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
        if (!isset($this->mappers[$name])) {
            $this->mappers[$name] = $this->mapperFactory->get($name, $this);
        }

        return $this->mappers[$name];
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