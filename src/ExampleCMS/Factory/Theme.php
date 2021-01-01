<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Theme extends Factory
{

    /**
     * @var array
     */
    protected $themes;

    /**
     * @var array
     */
    protected $metadataThemes;

    /**
     * @var \ExampleCMS\Container;
     */
    public $container;

    public function get($theme)
    {
        if (empty($this->metadataThemes)) {
            $this->metadataThemes = $this->metadata->get(['themes']);
        }

        if (isset($this->themes[$theme])) {
            return $this->themes[$theme];
        }

        if (empty($this->metadataThemes[$theme])) {
            throw new \ExampleCMS\Exception\Metadata(sprintf('theme "%s" is not defined', $theme));
        }

        $metadata = $this->metadataThemes[$theme];
        $metadata['name'] = $theme;

        /** @var $moduleObject \ExampleCMS\Contract\Module */
        $themeObject = $this->container->create($metadata['component']);
        $themeObject->setOptions($metadata);
        $themeObject->metadata = $this->metadata;

        $this->themes[$theme] = $themeObject;

        return $themeObject;
    }

}
