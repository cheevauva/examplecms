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
        $this->module = $module;
        $this->componentMetadata = $this->metadata->get(['components', (string) $this->module]);
    }

    public function __toString()
    {
        return $this->module;
    }

    protected function getResponderMetadata($type, $component)
    {
        $responderMetadata = $this->metadata->get([
            'responders',
            ucfirst($type),
            (string) $this->module,
        ]);

        if (empty($responderMetadata[$component]['component'])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('"component" for "%s" is not define', implode('.', [
                $component,
                'responders',
                ucfirst($type),
                (string) $this->module,
            ])));
        }

        return $responderMetadata[$component];
    }

    public function view($view)
    {
        $metadata = $view;

        if (is_string($view)) {
            $metadata = $this->getResponderMetadata('views', $view);
        }

        $component = $this->getView($metadata['component']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function layout($layout)
    {
        $metadata = $layout;

        if (is_string($layout)) {
            $metadata = $this->getResponderMetadata('layouts', $layout);
        }

        $component = $this->getLayout($metadata['component']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function row($row)
    {
        $metadata = $row;

        if (is_string($row)) {
            $metadata = $this->getResponderMetadata('rows', $row);
        }

        $component = $this->getRow($metadata['component']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function field($field)
    {
        $metadata = $field;

        if (is_string($field)) {
            $metadata = $this->getResponderMetadata('fields', $field);
        }

        $component = $this->getField($metadata['component']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function column($column)
    {
        $metadata = $column;

        if (is_string($column)) {
            $metadata = $this->getResponderMetadata('columns', $column);
        }

        $component = $this->getColumn($metadata['component']);
        $component->setMetadata($metadata);

        return $component;
    }

    protected function getFormMetadata($form)
    {
        $formMetadata = $this->metadata->get(['forms', (string) $this]);

        if (is_null($formMetadata[$form])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('forms "%s" is not define', $form));
        }

        if (!isset($formMetadata[$form]['component'])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('component for "%s" is not define', $form));
        }

        return $formMetadata[$form];
    }

    public function form($form)
    {
        $metadata = $form;

        if (is_string($form)) {
            $metadata = $this->getFormMetadata($form);
        }

        $component = $this->getForm($metadata['component']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function grid($grid)
    {
        $metadata = $grid;

        if (is_string($grid)) {
            $metadata = $this->getResponderMetadata('grids', $grid);
        }

        $component = $this->getGrid($metadata['component']);
        $component->setMetadata($metadata);

        return $component;
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
