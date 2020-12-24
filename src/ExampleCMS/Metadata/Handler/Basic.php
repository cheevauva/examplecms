<?php

namespace ExampleCMS\Metadata\Handler;

use ExampleCMS\Metadata\Arr;

class Basic
{

    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var array
     */
    protected $cursors;

    /**
     * @var \ExampleCMS\Contract\Filesystem
     */
    public $filesystem;
    protected $default;

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setRoute($route)
    {
        $this->path = $route;
    }

    public function getType()
    {
        return $this->type;
    }

    protected function preparePath($sourcePath, $vars)
    {
        $index = 0;
        $path = $sourcePath;

        foreach ($vars as $val) {
            $index++;
            $path = str_replace('$' . $index, $val, $path);
        }

        return $path;
    }

    public function get(array $path)
    {
        $module = [];
        $application = [];

        if (!empty($this->path['module'])) {
            $module = $this->filesystem->loadAsPHP($this->preparePath($this->path['module'], $path));
        }

        if (!empty($this->path['application'])) {
            $application = $this->filesystem->loadAsPHP($this->preparePath($this->path['application'], $path));
        }

        if (empty($module) && !empty($application)) {
            $module = $application;
            $application = [];
        }


        return new \ExampleCMS\Metadata\Arr($module, $application);
    }

}
