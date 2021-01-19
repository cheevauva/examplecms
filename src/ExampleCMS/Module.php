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

    /**
     * @var \ExampleCMS\Contract\Factory\Responder
     */
    public $responderFactory;

    public function setName($module)
    {
        $this->name = $module;
    }

    public function getName()
    {
        return $this->name;
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
