<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Renderer extends Factory implements \ExampleCMS\Contract\Factory\Renderer
{

    /**
     * @var array
     */
    protected $renderers;

    /**
     * @var array
     */
    protected $metadataRenderers;

    public function get($id)
    {
        if (empty($this->metadataRenderers)) {
            $this->metadataRenderers = $this->metadata->get(['renderer']);
        }

        if (isset($this->renderers[$id])) {
            return $this->renderers[$id];
        }

        if (empty($this->metadataRenderers[$id])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('renderer "%s" is not defined', $id));
        }

        $metadata = $this->metadataRenderers[$id];
        $metadata['name'] = $id;

        /* @var $renderer \ExampleCMS\Contract\Renderer */
        $renderer = $this->container->get($metadata['component']);
        $renderer->setOptions($metadata);

        $this->renderers[$id] = $renderer;

        return $renderer;
    }

}
