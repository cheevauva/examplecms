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

    /**
     * @param string|array $form
     * @return array|\ArrayAccess
     * @throws \ExampleCMS\Exception\Metadata
     */
    protected function getFormMetadata($form)
    {
        $formMetadata = $this->metadata->get(['forms', $this->name]);

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

        $component = $this->getComponent('forms.' . $metadata['component']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function model($model = 'model')
    {
        return $this->getComponent('models.' . $model);
    }

    public function action($action)
    {
        return $this->getComponent('actions.' . $action);
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

}
