<?php

namespace ExampleCMS\Contract;

interface Module
{

    /**
     * @param string|array $model
     * @return \ExampleCMS\Contract\Application\Model
     */
    public function model($model);

    /**
     * @param string|array $action
     * @return \ExampleCMS\Contract\Application\Action
     */
    public function action($action);

    /**
     * @param string $query
     * @return \ExampleCMS\Contract\Application\Query
     */
    public function query($query);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $module
     */
    public function setName($module);

    /**
     * @param string $mapper
     * @return \ExampleCMS\Contract\Application\Mapper
     */
    public function mapper($mapper);
}
