<?php

namespace ExampleCMS\Metadata\Handler;

use ExampleCMS\Metadata\Arr;

class ApplicationModule extends Handler
{

    public function get(array $path)
    {
        $module = [];
        $application = [];

        if (!empty($this->route['module'])) {
            $module = $this->filesystem->loadAsPHP($this->preparePath($this->route['module'], $path));
        }

        if (!empty($this->route['application'])) {
            $application = $this->filesystem->loadAsPHP($this->preparePath($this->route['application'], $path));
        }

        if (empty($module) && !empty($application)) {
            $module = $application;
            $application = [];
        }

        return new Arr($module, $application);
    }

}
