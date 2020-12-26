<?php

namespace ExampleCMS\Metadata\Handler;

class Application extends Handler
{

    public function get(array $path)
    {
        $application = [];

        if (!empty($this->route['application'])) {
            $application = $this->filesystem->loadAsPHP($this->preparePath($this->route['application'], $path));
        }

        return $application;
    }

}
