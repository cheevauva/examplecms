<?php

namespace ExampleCMS\Contract;

interface Module
{

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $module
     */
    public function setName($module);
}
