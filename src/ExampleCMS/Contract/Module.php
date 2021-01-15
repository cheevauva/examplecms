<?php

namespace ExampleCMS\Contract;

interface Module
{

    /**
     * @param string $model
     * @return \ExampleCMS\Contract\Application\Model
     */
    public function model($model = 'model');

    /**
     * @param string $form
     * @return \ExampleCMS\Contract\Application\Model
     */
    public function form($form);

    /**
     * @param string $action
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
     * @param string $field
     * @return \ExampleCMS\Contract\Application\Responder
     */
    public function field($field);

    /**
     * @param string $grid
     * @return \ExampleCMS\Contract\Application\Responder
     */
    public function grid($grid);

    /**
     * @param string $row
     * @return \ExampleCMS\Contract\Application\Responder
     */
    public function row($row);

    /**
     * @param string $view
     * @return \ExampleCMS\Contract\Application\Responder
     */
    public function view($view);

    /**
     * @param string $layout
     * @return \ExampleCMS\Contract\Application\Responder
     */
    public function layout($layout);

    /**
     * @param string $mapper
     * @return \ExampleCMS\Contract\Application\Mapper
     */
    public function mapper($mapper);

    /**
     * @param string $column
     * @return \ExampleCMS\Contract\Application\Responder
     */
    public function column($column);
}
