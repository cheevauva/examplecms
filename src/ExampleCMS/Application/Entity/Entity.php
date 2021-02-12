<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Entity;

use ExampleCMS\Contract\Application\Entity\EntityRelation;
use ExampleCMS\Contract\Application\Entity as EntityInterface;

abstract class Entity implements EntityInterface
{

    /**
     * @var \ExampleCMS\Contract\Factory\EntityMapper 
     */
    public $mapperFactory;

    /**
     * @var \ExampleCMS\Contract\Factory\QueryWithEntity
     */
    public $queryFactory;

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

    const META_MAPPER_DECODE = 'mapper_encode';
    const META_MAPPER_ENCODE = 'mapper_decode';
    const META_ENTITY_NAME = 'name';
    const META_APPLY_QUERY = 'query_apply';
    const META_RELATIONS = 'relations';

    /**
     * @var EntityRelation[]
     */
    protected $relationEntitiesNotApplied = [];

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

        $this->meta[self::META_APPLY_QUERY] = $this->meta[self::META_APPLY_QUERY] ?? $this->applyQueryName();
        $this->meta[static::META_ENTITY_NAME] = $this->meta[static::META_ENTITY_NAME];
    }

    public function entityName()
    {
        return $this->meta[static::META_ENTITY_NAME];
    }

    protected abstract function encodeMapperName();

    protected abstract function decodeMapperName();

    protected function applyQueryName()
    {
        return 'save';
    }

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
        $attributes = [];
        
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

    public function attribute($attribute, $value = null)
    {
        if (is_null($value)) {
            return $this->attributes[$attribute];
        }

        $this->attributes[$attribute] = $value;
    }

    public function isValid()
    {
        return true;
    }

    public function relation($relation)
    {
        if (isset($this->relations)) {
            $this->relations[$relation] = $this->query($this->meta[static::META_RELATIONS][$relation]);
        }

        return $this->relations[$relation];
    }

    public function apply()
    {
        foreach ($this->relationEntitiesNotApplied as $relationEntity) {
            $relationEntity->apply();
        }

        $this->relationEntitiesNotApplied = [];

        $this->query($this->meta[self::META_APPLY_QUERY])->execute();
    }

    public function attach($relation, EntityInterface $entity)
    {
        $entityRelation = $this->entityFactory->get($this->metadata[static::META_RELATIONS][$relation][static::META_RELATION_TYPE]);
        $entityRelation->current($this);
        $entityRelation->related($entity);
        $entityRelation->markAsUndeleted();

        $this->relationEntitiesNotApplied[] = $entityRelation;

        return $entityRelation;
    }

    public function detach($relation, EntityInterface $entity)
    {
        $entityRelation = $this->entityFactory->get($this->metadata[static::META_RELATIONS][$relation][static::META_RELATION_TYPE]);
        $entityRelation->current($this);
        $entityRelation->related($entity);
        $entityRelation->markAsDeleted();

        $this->relationEntitiesNotApplied[] = $entityRelation;

        return $entityRelation;
    }

    /**
     * @param string $name
     * @return \ExampleCMS\Contract\Application\Query
     */
    protected function query($name)
    {
        return $this->queryFactory->get($name, $this);
    }

}
