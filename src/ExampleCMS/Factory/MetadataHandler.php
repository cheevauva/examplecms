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

        /* @var $component \ExampleCMS\Contract\Metadata\Handler */
        $component = $this->builder->make($handlerMetadata['component'], [
            $handlerMetadata,
        ]);

        if (!empty($handlerMetadata['cache']['disable'])) {
            return $component;
        }

        $cacheHandlerMetadata = $handlerMetadata;
        $cacheHandlerMetadata['name'] = $id;

        $id = \ExampleCMS\Metadata\Handler\Cache::class;

        if (!empty($handlerMetadata['cacheComponent'])) {
            $id = $handlerMetadata['cacheComponent'];
        }

        /* @var $cacheComponent \ExampleCMS\Contract\Metadata\Handler */
        return $this->builder->make($id, [
            $cacheHandlerMetadata,
            $component
        ]);
    }

}
