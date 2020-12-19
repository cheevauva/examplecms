<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory\Metadata;

class Handler extends \ExampleCMS\Factory\Factory
{

    /**
     * @var array
     */
    protected $handlers = array();

    /**
     * @var array
     */
    protected $handlersMetadata = array();

    public function get($handler)
    {
        if (!empty($this->handlers[$handler])) {
            return $this->handlers[$handler];
        }

        $this->loadHandlersMetadata();

        $handlerMetadata = $this->handlersMetadata[$handler];

        $component = $this->container->create($handlerMetadata['component']);
        $component->filesystem = $this->filesystem;
        $component->setType($handler);
        $component->setRoute($handlerMetadata['route']);

        if (!empty($handlerMetadata['switch'])) {
            $component->setSwitch($handlerMetadata['switch']);
        }
        
        if (empty($handlerMetadata['disableCache'])) {
            $cacheComponent = $this->container->create($this->handlersMetadata['cache']['component']);
            $cacheComponent->handler = $component;

            $this->handlers[$handler] = $cacheComponent;
        } else {
            $this->handlers[$handler] = $component;
        }

        return $this->handlers[$handler];
    }

    protected function loadHandlersMetadata()
    {
        if (empty($this->handlersMetadata)) {
            $this->handlersMetadata = $this->filesystem->loadAsPHPByVar('vendor/application/Ext/Handlers/handlers.ext.php', 'handlers');
        }

        return $this->handlersMetadata;
    }

}
