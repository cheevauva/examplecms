<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Metadata\Handler;

class ApplicationModule extends Handler
{

    /**
     * @var \ExampleCMS\Contract\Factory\MetadataHandler 
     */
    public $metadataHandlerFactory;
    protected $applicationHandler;
    protected $moduleHandler;

    public function get(array $path)
    {
        if (!$this->applicationHandler) {
            $this->applicationHandler = $this->metadataHandlerFactory->get($this->metadata['route']['application']);
        }

        if (!$this->moduleHandler) {
            $this->moduleHandler = $moduleHandler = $this->metadataHandlerFactory->get($this->metadata['route']['module']);
        }

        $module = $this->moduleHandler->get($path);

        $pathApplication = $path;

        array_pop($pathApplication);

        $application = $this->applicationHandler->get($pathApplication);

        if (empty($module) && !empty($application)) {
            $module = $application;
            $application = [];
        }

        return new \ExampleCMS\Helper\ArraySwitcher($module, $application);
    }

}
