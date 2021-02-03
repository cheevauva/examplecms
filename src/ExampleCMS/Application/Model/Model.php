<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Model;

class Model implements \ExampleCMS\Contract\Application\Model
{

    /**
     * @var \ExampleCMS\Contract\Factory\Mapper 
     */
    public $mapperFactory;

    /**
     * @var \ExampleCMS\Contract\Module
     */
    public $module;

    /**
     * @var array
     */
    protected $attributes = array();

    /**
     * @var array
     */
    protected $metadata;

    const MAPPER_TO_MODEL = 'mapper_data_to_model';
    const MAPPER_FROM_MODEL = 'mapper_model_to_data';

    public function getModule()
    {
        return $this->module;
    }

    public function setModule($module)
    {
        $this->module = $module;
    }

    public function getModelName()
    {
        return $this->metadata['name'];
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

    /**
     * @param array $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    public function getMetadata()
    {
        return $this->metadata;
    }

    public function bindTo(Model $model)
    {
        foreach ($this->attributes as $attribute => $value) {
            $model->set($attribute, $value);
        }
    }

    public function bindFrom(Model $model)
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
        $dataMapper = $this->mapper($this->metadata[static::MAPPER_TO_MODEL]);
        $dataMapper->execute([
            $dataMapper::FROM => $data,
            $dataMapper::TO => $this
        ]);
    }

    public function doMappingFromModelToData($data)
    {
        $dataMapper = $this->mapper($this->metadata[static::MAPPER_FROM_MODEL]);
        $dataMapper->execute([
            $dataMapper::FROM => $this,
            $dataMapper::TO => $data
        ]);
    }

}
