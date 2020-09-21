<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS;

class DataSource
{
    /**
     * @var \ExampleCMS\Contract\Module
     */
    protected $module;

    public function setModule($module)
    {
        $this->module = $module;
    }

}
