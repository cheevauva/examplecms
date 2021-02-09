<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Entity;

class Entity implements \ExampleCMS\Contract\Application\Entity
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
    protected $attributes = array();

    /**
     * @var array
     */
    protected $meta;

    const MAPPER_TO_MODEL = 'mapper_data_to_model';
    const MAPPER_FROM_MODEL = 'mapper_model_to_data';

    public function getModule()
    {
        return $this->module;
    }

    public function __construct(\ExampleCMS\Contract\Module $module, array $metadata)
    {
        $this->module = $module;
        $this->meta = $metadata;
    }

    public function getModelName()
    {
        return $this->meta['name'];
    }

    public function set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function get($name)
    {
        if (!isset($this->attributes[$name])) {
            return null;
        }

        return $this->attributes[$name];
    }

    public function fromArray(array $array)
    {
        $this->attributes = $array;
    }

    public function toArray()
    {
        return $this->attributes;
    }

    public function isNull()
    {
        return !$this->module || !$this->attributes;
    }

    public function reset()
    {
        $this->attributes = array();
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

    public function bindTo(Entity $model)
    {
        foreach ($this->attributes as $attribute => $value) {
            $model->set($attribute, $value);
        }
    }

    public function bindFrom(Entity $model)
    {
        $this->attributes = $model->toArray();
    }

    /**
     * @param string $name
     * @return \ExampleCMS\Contract\Application\Mapper
     */
    protected function mapper($name)
    {
        return $this->mapperFactory->get($name, $this->module);
    }

    public function doMappingFromDataToModel($data)
    {
        $dataMapper = $this->mapper($this->meta[static::MAPPER_TO_MODEL]);
        $dataMapper->execute([
            $dataMapper::FROM => $data,
            $dataMapper::TO => $this
        ]);
    }

    public function doMappingFromModelToData($data)
    {
        $dataMapper = $this->mapper($this->meta[static::MAPPER_FROM_MODEL]);
        $dataMapper->execute([
            $dataMapper::FROM => $this,
            $dataMapper::TO => $data
        ]);
    }

}
