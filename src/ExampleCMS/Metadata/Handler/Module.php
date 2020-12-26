<?php

namespace ExampleCMS\Metadata\Handler;

class Module extends Handler
{

    public function get(array $path)
    {
        $module = [];

        if (!empty($this->route['module'])) {
            $module = $this->filesystem->loadAsPHP($this->preparePath($this->route['module'], $path));
        }

        return $module;
    }

}
