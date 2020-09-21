<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS;

class Bundle implements \ExampleCMS\Contract\Bundle
{

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     * @var string
     */
    protected $bundle;

    /**
     * @var array
     */
    protected $componentMetadata;

    public function setBundle($bundle)
    {
        $this->bundle = $bundle;
        $this->componentMetadata = $this->metadata->get(array(
            'components',
            $this->bundle,
        ));
    }

    protected function getComponent($component)
    {
        $componentObject = $this->container->create($this->componentMetadata[$component]);
        $componentObject->setModule($this->getModule());
        $componentObject->bundle = $this;

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

    public function getStorage($storage)
    {
        return $this->getComponent('storages.' . $storage);
    }

    public function getModule()
    {
        return $this->moduleFactory->get($this->bundle);
    }

}
