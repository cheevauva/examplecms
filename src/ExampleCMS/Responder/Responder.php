<?php

namespace ExampleCMS\Responder;

class Responder
{

    /**
     * @var \ExampleCMS\Contract\Metadata
     */
    public $metadata;

    /**
     *
     * @var \ExampleCMS\Contract\Module
     */
    public $module;

    public function __construct(\ExampleCMS\Contract\Module $module)
    {
        $this->module = $module;
        $this->metadata = $module->metadata;
        $this->bundle = $module->getBundle();
    }

    protected function getResponderMetadata($type, $component)
    {
        $target = $type . '.' . $component;

        $responderMetadata = $this->metadata->get([
            'responders',
            (string) $this->module,
        ]);
        
        if (!isset($responderMetadata[$target]['type'])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('"type" for "%s" is not define', $target));
        }

        return $responderMetadata[$target];
    }

    public function view($view)
    {
        $metadata = $view;

        if (is_string($view)) {
            $metadata = $this->getResponderMetadata('views', $view);
        }

        $component = $this->bundle->getView($metadata['type']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function layout($layout)
    {
        $metadata = $layout;

        if (is_string($layout)) {
            $metadata = $this->getResponderMetadata('layouts', $layout);
        }

        $component = $this->bundle->getLayout($metadata['type']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function row($row)
    {
        $metadata = $row;

        if (is_string($row)) {
            $metadata = $this->getResponderMetadata('rows', $row);
        }

        $component = $this->bundle->getRow($metadata['type']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function field($field)
    {
        $metadata = $field;

        if (is_string($field)) {
            $metadata = $this->getResponderMetadata('fields', $field);
        }

        $component = $this->bundle->getField($metadata['type']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function column($column)
    {
        $metadata = $column;

        if (is_string($column)) {
            $metadata = $this->getResponderMetadata('columns', $column);
        }

        $component = $this->bundle->getColumn($metadata['type']);
        $component->setMetadata($metadata);

        return $component;
    }

    public function grid($grid)
    {
        $metadata = $grid;

        if (is_string($grid)) {
            $metadata = $this->getResponderMetadata('grids', $grid);
        }

        $component = $this->bundle->getGrid($metadata['type']);
        $component->setMetadata($metadata);

        return $component;
    }

}
