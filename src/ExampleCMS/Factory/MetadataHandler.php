<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class MetadataHandler extends Factory implements \ExampleCMS\Contract\Factory\MetadataHandler
{

    /**
     * @var array
     */
    protected $handlers = array();

    /**
     * @var array
     */
    protected $handlersMetadata = array();
    
    /**
     * @var \ExampleCMS\Contract\Filesystem 
     */
    public $filesystem;

    public function get($id): \ExampleCMS\Contract\Metadata\Handler
    {
        if (!empty($this->handlers[$id])) {
            return $this->handlers[$id];
        }

        $this->loadHandlersMetadata();

        $handlerMetadata = $this->handlersMetadata[$id];
        $handlerMetadata['name'] = $id;

        $component = $this->container->get($handlerMetadata['component']);
        $component->setMetadata($handlerMetadata);

        if (empty($handlerMetadata['cache']['disable'])) {
            $cacheHandlerMetadata = $handlerMetadata;
            $cacheHandlerMetadata['name'] = $id;
            $cacheHandlerMetadata['component'] = $component;

            $cacheComponent = $this->container->get('ExampleCMS\Metadata\Handler\Cache');
            $cacheComponent->setMetadata($cacheHandlerMetadata);

            $this->handlers[$id] = $cacheComponent;
        } else {
            $this->handlers[$id] = $component;
        }

        return $this->handlers[$id];
    }

    protected function loadHandlersMetadata()
    {
        if (empty($this->handlersMetadata)) {
            $this->handlersMetadata = $this->filesystem->loadAsPHP('cache/metadata/application/Handlers.php');
        }

        return $this->handlersMetadata;
    }

}
