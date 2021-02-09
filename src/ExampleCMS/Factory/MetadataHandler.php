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
    protected $handlersMetadata = [];

    public function __construct($metadata)
    {
        $this->handlersMetadata = $metadata;
    }

    public function get($id)
    {
        if (empty($this->handlersMetadata[$id])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('handler "%s" not defined in hanlersMetadata', $id));
        }

        $handlerMetadata = $this->handlersMetadata[$id];
        $handlerMetadata['name'] = $id;

        $component = $this->builder->make($handlerMetadata['component']);
        $component->setMetadata($handlerMetadata);

        if (!empty($handlerMetadata['cache']['disable'])) {
            return $component;
        }

        $cacheHandlerMetadata = $handlerMetadata;
        $cacheHandlerMetadata['name'] = $id;
        $cacheHandlerMetadata['component'] = $component;

        /* @var $cacheComponent \ExampleCMS\Contract\Metadata\Handler */
        $cacheComponent = $this->builder->make('metadataHandlerCache');
        $cacheComponent->setMetadata($cacheHandlerMetadata);

        return $cacheComponent;
    }

}
