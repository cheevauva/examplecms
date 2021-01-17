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
    protected $handlers = [];

    /**
     * @var array
     */
    protected $handlersMetadata = [];

    public function get($id)
    {
        if (!empty($this->handlers[$id])) {
            return $this->handlers[$id];
        }

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

}
