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
     * @var \ExampleCMS\Contract\Factory\Query
     */
    public $queryFactory;

    /**
     * @var \ExampleCMS\Contract\Module
     */
    protected $module;

    /**
     * @var array 
     */
    protected $metadata;

    public function setModule($module)
    {
        $this->module = $module;
    }

    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @param string $name
     * @return \ExampleCMS\Contract\Application\Query
     */
    protected function query($name)
    {
        return $this->queryFactory->get($name, $this->module);
    }

}
