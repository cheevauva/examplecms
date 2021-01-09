<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS;

class Metadata implements \ExampleCMS\Contract\Metadata
{

    /**
     * @var \ExampleCMS\Contract\Factory\MetadataHandler
     */
    public $metadataHandlerFactory;

    public function get(array $path)
    {
        if (empty($path)) {
            throw new \RuntimeException('path must be not empty array');
        }

        $metadataHandler = $this->metadataHandlerFactory->get(array_shift($path));

        return $metadataHandler->get($path);
    }

}
