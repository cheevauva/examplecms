<?php

namespace ExampleCMS\Contract\Application;

use ExampleCMS\Contract\Entity;

interface Model extends Entity
{

    /**
     * @return bool
     */
    public function isNull();

    /**
     * @return \ExampleCMS\Contract\Module
     */
    public function getModule();

    /**
     * @param \ExampleCMS\Contract\Module $module
     */
    public function setModule($module);

    /**
     * @param array $array
     */
    public function fromArray(array $array);

    /**
     * @return array
     */
    public function toArray();

    /**
     * @param mixed $data
     */
    public function doMappingFromDataToModel($data);

    /**
     * @param mixed $data
     */
    public function doMappingFromModelToData($data);

    public function getMetadata();

    /**
     * @param string $name
     * @param mixed $value
     */
    public function set($name, $value);

    /**
     * @param string $name
     * @return mixed
     */
    public function get($name);
}
