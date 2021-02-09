<?php

namespace ExampleCMS\Contract\Application;

use ExampleCMS\Contract\Module;

interface Entity
{

    /**
     * @return bool
     */
    public function isNull();

    /**
     * @return Module
     */
    public function getModule();

    /**
     * @return array
     */
    public function getMeta();

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
