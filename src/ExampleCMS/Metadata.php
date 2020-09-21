<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS;

class Metadata implements \ExampleCMS\Contract\Metadata
{

    /**
     * @var \ExampleCMS\Contract\Factory\Metadata\Handler
     */
    public $metadataHandlerFactory;

    public function get(array $path)
    {
        if (empty($path)) {
            throw new \Exception('path must be not empty');
        }

        $handler = array_shift($path);
        $handlerComponent = $this->metadataHandlerFactory->get($handler);
        
        return $handlerComponent->get($path);
    }
}
