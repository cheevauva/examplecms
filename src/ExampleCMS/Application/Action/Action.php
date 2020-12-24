<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Application\Action;

abstract class Action implements \ExampleCMS\Contract\Action
{

    /**
     * @var \ExampleCMS\Contract\Context
     */
    public $context;

    /**
     * @var \ExampleCMS\Contract\Request
     */
    public $request;
    
    protected $module;
    
    public function setModule($module)
    {
        $this->module = $module;
    }
}
