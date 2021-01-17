<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS;

class Module implements \ExampleCMS\Contract\Module
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     * @var \ExampleCMS\Factory\Component
     */
    public $componentFactory;

    public function setName($module)
    {
        $this->name = $module;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $type
     * @param string $component
     * @return array|\ArrayAccess
     * @throws \ExampleCMS\Exception\Metadata
     */
    protected function getResponderMetadata($type, $component)
    {
        $responderMetadata = $this->metadata->get([
            'responders',
            ucfirst($type),
            $this->name,
        ]);

        if (empty($responderMetadata[$component]['component'])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('"component" for "%s" is not define', implode('.', [
                $component,
                'responders',
                ucfirst($type),
                $this->name,
            ])));
        }

        return $responderMetadata[$component];
    }

    protected function responder($type, $name)
    {
        $metadata = $name;

        if (is_string($name)) {
            $metadata = $this->getResponderMetadata($type, $name);
        }

        $component = $this->getComponent($type . '.' . $metadata['component']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function view($view)
    {
        return $this->responder('views', $view);
    }

    public function layout($layout)
    {
        return $this->responder('layouts', $layout);
    }

    public function row($row)
    {
        return $this->responder('rows', $row);
    }

    public function field($field)
    {
        return $this->responder('fields', $field);
    }

    public function column($column)
    {
        return $this->responder('columns', $column);
    }

    public function grid($grid)
    {
        return $this->responder('grids', $grid);
    }

    public function model($model = 'model')
    {
        $metadata = $model;

        if (is_string($model)) {
            $metadata = $this->metadata->get(['models', $this->name]);

            if (is_null($metadata[$model])) {
                throw new \ExampleCMS\Exception\Metadata(sprintf('model "%s" is not define', $model));
            }

            if (!isset($metadata[$model]['component'])) {
                throw new \ExampleCMS\Exception\Metadata(sprintf('component for "%s" is not define', $model));
            }

            $metadata = $metadata[$model];
        }

        $component = $this->getComponent('models.' . $metadata['component']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function action($action)
    {
        $metadata = [];
        
        if (!is_string($action)) {
            $metadata = $action;
            $action = $metadata['component'];
        }

        $component = $this->getComponent('actions.' . $action);
        $component->setMetadata($metadata);

        return $component;
    }

    public function query($query)
    {
        return $this->getComponent('queries.' . $query);
    }

    public function mapper($mapper)
    {
        return $this->getComponent('mappers.' . $mapper);
    }

    protected function getComponent($component)
    {
        $componentObject = $this->componentFactory->get($component, $this);

        if (method_exists($componentObject, 'setModule')) {
            $componentObject->setModule($this);
        }

        return $componentObject;
    }
    
    public function __toString()
    {
        return $this->name;
    }

}
