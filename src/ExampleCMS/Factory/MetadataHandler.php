<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class MetadataHandler extends Factory
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
        $handlerMetadata['name'] = $handler;

        $component = $this->container->create($handlerMetadata['component']);
        $component->setMetadata($handlerMetadata);
        $component->filesystem = $this->filesystem;

        if (empty($handlerMetadata['cache']['disable'])) {
            $cacheHandlerMetadata = $handlerMetadata;
            $cacheHandlerMetadata['name'] = $handler;
            $cacheHandlerMetadata['component'] = $component;

            $cacheComponent = $this->container->create('ExampleCMS\Metadata\Handler\Cache');
            $cacheComponent->setMetadata($cacheHandlerMetadata);

            $this->handlers[$handler] = $cacheComponent;
        } else {
            $this->handlers[$handler] = $component;
        }

        return $this->handlers[$handler];
    }

    protected function loadHandlersMetadata()
    {
        if (empty($this->handlersMetadata)) {
            $this->handlersMetadata = $this->filesystem->loadAsPHP('cache/metadata/application/Handlers.php');
        }

        return $this->handlersMetadata;
    }

}
