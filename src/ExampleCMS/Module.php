<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS;

class Module implements \ExampleCMS\Contract\Module
{

    protected $responder;

    /**
     * @var string
     */
    protected $module;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    public function init($module)
    {
        $this->data = $this->metadata->get(['modules', $module]);
        $this->module = $module;
        $this->componentMetadata = $this->metadata->get(['components', (string) $this->module]);
    }


    public function __toString()
    {
        return $this->module;
    }

    public function model($modelType = 'base')
    {
        return $this->getModel($modelType);
    }

    public function storage()
    {
        return $this->getStorage();
    }

    public function dataSource($dataSource)
    {
        return $this->getDataSource($dataSource);
    }

    public function action($action)
    {
        return $this->getAction($action);
    }

    public function query($query)
    {
        return $this->getQuery($query);
    }

    public function responder()
    {
        if (!$this->responder) {
            $this->responder = new \ExampleCMS\Responder\Responder($this);
        }

        return $this->responder;
    }

    protected function getComponent($component)
    {
        $componentObject = $this->container->create($this->componentMetadata[$component]);
        $componentObject->setModule($this);

        return $componentObject;
    }

    public function getQuery($query)
    {
        return $this->getComponent('queries.' . $query);
    }

    public function getGrid($grid)
    {
        return $this->getComponent('grids.' . $grid);
    }

    public function getRow($row)
    {
        return $this->getComponent('rows.' . $row);
    }

    public function getView($view)
    {
        return $this->getComponent('views.' . $view);
    }

    public function getAction($action)
    {
        return $this->getComponent('actions.' . $action);
    }

    public function getModel($model)
    {
        return $this->getComponent('models.' . $model);
    }

    public function getLayout($layout)
    {
        return $this->getComponent('layouts.' . $layout);
    }

    public function getDataSource($dataSource)
    {
        return $this->getComponent('datasource.' . $dataSource);
    }

    public function getColumn($column)
    {
        return $this->getComponent('columns.' . $column);
    }

    public function getForm($form)
    {
        return $this->getComponent('forms.' . $form);
    }

    public function getField($field)
    {
        return $this->getComponent('fields.' . $field);
    }

    public function getTable($table)
    {
        return $this->getComponent('tables.' . $table);
    }

    public function theme($theme)
    {
        $th = new \ExampleCMS\Application\Theme\Basic;
        $th->metadata = $this->metadata;
        $th->setModule($this);
        $th->setTheme($theme);

        return $th;
    }

}
