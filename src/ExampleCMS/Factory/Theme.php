<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Theme extends Factory implements \ExampleCMS\Contract\Factory\Theme
{

    /**
     * @var array
     */
    protected $themes;

    /**
     * @var array
     */
    protected $metadataThemes;

    public function get($id)
    {
        if (empty($this->metadataThemes)) {
            $this->metadataThemes = $this->metadata->get(['themes']);
        }

        if (isset($this->themes[$id])) {
            return $this->themes[$id];
        }

        if (empty($this->metadataThemes[$id])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('theme "%s" is not defined', $id));
        }

        $metadata = $this->metadataThemes[$id];
        $metadata['name'] = $id;

        /* @var $theme \ExampleCMS\Contract\Application\Theme */
        $theme = $this->container->get($metadata['component']);
        $theme->setOptions($metadata);

        $this->themes[$id] = $theme;

        return $theme;
    }

}
