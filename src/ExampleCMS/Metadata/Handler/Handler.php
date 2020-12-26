<?php

namespace ExampleCMS\Metadata\Handler;

abstract class Handler
{

    /**
     * @var string
     */
    protected $route;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var \ExampleCMS\Contract\Filesystem
     */
    public $filesystem;

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setRoute($route)
    {
        $this->route = $route;
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

    abstract public function get(array $path);
}
