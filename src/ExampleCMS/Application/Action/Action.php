<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Action;

abstract class Action implements \ExampleCMS\Contract\Application\Action
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
