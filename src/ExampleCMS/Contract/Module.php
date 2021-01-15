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
    public function getModule();

    /**
     * @param string $field
     */
    public function field($field);

    /**
     * @param string $grid
     */
    public function grid($grid);

    /**
     * @param string $row
     */
    public function row($row);

    /**
     * @param string $view
     */
    public function view($view);

    /**
     * @param string $layout
     */
    public function layout($layout);

    /**
     * @param string $mapper
     */
    public function mapper($mapper);
    
    /**
     * @param string $column
     */
    public function column($column);
}
