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

    public function get(array $path)
    {
        $applicationHandler = $this->metadataHandlerFactory->get($this->metadata['route']['application']);
        $moduleHandler = $this->metadataHandlerFactory->get($this->metadata['route']['module']);

        $module = $moduleHandler->get($path);

        $pathApplication = $path;

        array_pop($pathApplication);

        $application = $applicationHandler->get($pathApplication);

        if (empty($module) && !empty($application)) {
            $module = $application;
            $application = [];
        }

        return new \ExampleCMS\Helper\ArraySwitcher($module, $application);
    }

}
