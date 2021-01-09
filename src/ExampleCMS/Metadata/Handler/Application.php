<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Metadata\Handler;

class Application extends Handler
{

    /**
     * @var \ExampleCMS\Contract\Filesystem
     */
    public $filesystem;

    public function get(array $path)
    {
        $application = [];

        if (!empty($this->route['application'])) {
            $application = $this->filesystem->loadAsPHP($this->preparePath($this->route['application'], $path));
        }

        return $application;
    }

}
