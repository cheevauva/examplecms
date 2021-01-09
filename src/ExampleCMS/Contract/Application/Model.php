<?php

namespace ExampleCMS\Contract\Application;

interface Model
{

    /**
     * @return bool
     */
    public function isNull();

    /**
     * @return string
     */
    public function getModule();

    /**
     * @param strin $module
     */
    public function setModule($module);

    /**
     * @param array $array
     */
    public function fromArray(array $array);

    /**
     * @param mixed $data
     */
    public function doMappingFromDataToModel($data);

    /**
     * @param mixed $data
     */
    public function doMappingFromModelToData($data);
    
    public function getMetadata();
}
