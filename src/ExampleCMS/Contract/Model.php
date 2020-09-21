<?php

namespace ExampleCMS\Contract;

interface Model extends GetterSetter
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
}
