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

    /**
     * @var array
     */
    protected $handlers = [];

    public function get(array $path)
    {
        if (empty($path)) {
            throw new \RuntimeException('path must be not empty array');
        }

        $id = array_shift($path);

        return $this->getMetadataHandler($id)->get($path);
    }

    /**
     * @param string $id
     * @return \ExampleCMS\Contract\Metadata\Handler
     */
    protected function getMetadataHandler($id)
    {
        if (!empty($this->handlers[$id])) {
            return $this->handlers[$id];
        }

        $this->handlers[$id] = $this->metadataHandlerFactory->get($id);

        return $this->handlers[$id];
    }

}
