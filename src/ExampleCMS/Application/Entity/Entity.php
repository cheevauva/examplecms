<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Entity;

use ExampleCMS\Contract\Application\Entity\EntityRelation;
use ExampleCMS\Contract\Application\Entity as EntityInterface;

class Entity implements EntityInterface
{

    /**
     * @var \ExampleCMS\Contract\Factory\Mapper 
     */
    public $mapperFactory;

    /**
     * @var \ExampleCMS\Contract\Factory\QueryWithEntity
     */
    public $queryFactory;

    /**
     * @var \ExampleCMS\Contract\Factory\Entity
     */
    public $entityFactory;

    /**
     * @var \ExampleCMS\Contract\Helper\UUID
     */
    public $uuid;

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

    const META_MAPPERS = 'mappers';
    const META_MAPPER_DECODE = 'decode';
    const META_MAPPER_ENCODE = 'encode';
    const META_ENTITY_NAME = 'name';
    const META_APPLY_QUERY = 'query-apply';
    const META_RELATIONS = 'relations';
    const META_RELATION_TYPE = 'type';

    /**
     * @var EntityRelation[]
     */
    protected $relationEntitiesNotApplied = [];

    public function __construct(\ExampleCMS\Contract\Module $module, array $metadata)
    {
        $this->module = $module;
        $this->meta = $metadata;

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

    protected function getId()
    {
        if (empty($this->attributes['id'])) {
            $this->attributes['id'] = $this->uuid->guid();
        }

        return $this->attributes['id'];
    }

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

    public function pull(\ExampleCMS\Contract\Application\Entity $entity)
    {
        foreach ($entity->attributes as $attribute => $value) {
            $this->attributes[$attribute] = $value;
        }
    }

    /**
     * @param string $name
     * @return \ExampleCMS\Contract\Application\Mapper
     */
    protected function mapper($name)
    {
        if (empty($this->meta[static::META_MAPPERS][$name])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('mapper "%s" not defined for "%s" entity', $name, $this->entityName()));
        }

        return $this->mapperFactory->getByMeta($this->meta[static::META_MAPPERS][$name], $this->module);
    }

    public function decode($data)
    {
        $attributes = $this->mapper(static::META_MAPPER_DECODE)->execute($data);

        foreach ($attributes as $attribute => $value) {
            $this->attribute($attribute, $value);
        }
    }

    public function mapping(string $mapper, array $data = [])
    {
        $data['entity'] = $this;
        $data['attributes'] = $this->attributes;

        return $this->mapper($mapper)->execute($data);
    }

    public function encode()
    {
        return $this->mapper(static::META_MAPPER_ENCODE)->execute($this->attributes);
    }

    protected function isEmpty($attribute)
    {
        return empty($this->attributes[$attribute]);
    }

    protected function isNotEmpty($attribute): bool
    {
        return !empty($this->attributes[$attribute]);
    }

    protected function attribute($attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }

    public function isValid()
    {
        return true;
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
        /* @var $entityRelation EntityRelation */
        $entityRelation = $this->entityFactory->makeByMetadata($this->meta[static::META_RELATIONS][$relation], $this->module);
        $entityRelation->current($this);
        $entityRelation->related($entity);
        $entityRelation->markAsUndeleted();

        $this->relationEntitiesNotApplied[] = $entityRelation;

        return $entityRelation;
    }

    public function detach($relation, EntityInterface $entity)
    {
        /* @var $entityRelation EntityRelation */
        $entityRelation = $this->entityFactory->makeByMetadata($this->meta[static::META_RELATIONS][$relation], $this->module);
        $entityRelation->current($this);
        $entityRelation->related($entity);
        $entityRelation->markAsDeleted();

        $this->relationEntitiesNotApplied[] = $entityRelation;

        return $entityRelation;
    }

    protected function query(string $name)
    {
        return $this->queryFactory->get($name, $this->module, $this);
    }

}
