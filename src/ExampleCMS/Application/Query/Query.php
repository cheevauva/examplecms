<?php

namespace ExampleCMS\Application\Query;

abstract class Query implements \ExampleCMS\Contract\Application\Query
{

    /**
     * @var \ExampleCMS\Contract\Module 
     */
    protected $module;

    /**
     * @var \ExampleCMS\Contract\Factory\Model 
     */
    public $modelFactory;

    /**
     * @param \ExampleCMS\Contract\Module $module
     */
    public function setModule(\ExampleCMS\Contract\Module $module)
    {
        $this->module = $module;
    }

    public function execute(array $params = [], $autoExecute = true)
    {
        
    }

    public function fetch(array $params = [])
    {
        
    }

    /**
     * @param string $name
     * @return \ExampleCMS\Contract\Application\Model
     */
    protected function model($name)
    {
        return $this->modelFactory->get($name, $this->module);
    }

}
