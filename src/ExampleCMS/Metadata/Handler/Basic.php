<?php

namespace ExampleCMS\Metadata\Handler;

use ExampleCMS\Metadata\Handler\Basic\MetadataArray;

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

    public function get(array $path)
    {
        $level = array_shift($path);

        $module = [];
        $application = [];

        if (!empty($this->path['module'])) {
            $modulePath = str_replace('$1', $level, $this->path['module']);
            $module = $this->filesystem->loadAsPHP($modulePath);

            if (!empty($module[$level])) {
                $module = $module[$level];
            }
        }

        if (!empty($this->path['application'])) {
            $application = $this->filesystem->loadAsPHP($this->path['application']);

            if (!empty($application[$level])) {
                $application = $application[$level];
            }
        }

        if (empty($module) && !empty($application)) {
            $module = $application;
            $application = [];
        }


        return new MetadataArray($module, $application);
    }

}
