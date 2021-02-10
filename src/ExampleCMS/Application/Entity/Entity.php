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
        $this->mapper($this->meta[static::MAPPER_TO_MODEL])->execute($data);
    }

    public function encode()
    {
        return $this->mapper($this->meta[static::MAPPER_FROM_MODEL])->execute();
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
