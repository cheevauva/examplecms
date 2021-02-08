<?php

namespace ExampleCMS\Application\Query;

abstract class Query implements \ExampleCMS\Contract\Application\Query
{

    /**
     * @var \ExampleCMS\Contract\Module 
     */
    protected $module;

    /**
     * @var \ExampleCMS\Contract\Factory\Entity 
     */
    public $entityFactory;

    /**
     * @param \ExampleCMS\Contract\Module $module
     */
    public function setModule(\ExampleCMS\Contract\Module $module)
    {
        $this->module = $module;
    }

    /**
     * @param string $name
     * @return \ExampleCMS\Contract\Application\Model
     */
    protected function entity($name)
    {
        return $this->entityFactory->get($name, $this->module);
    }

    public function execute(array $params = [])
    {
        throw new \BadMethodCallException(__METHOD__);
    }

    public function fetch(array $params = [])
    {
        throw new \BadMethodCallException(__METHOD__);
    }

}
