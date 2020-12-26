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
    protected $name;

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var \ExampleCMS\Contract\Filesystem
     */
    public $filesystem;

    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;
        $this->name = $metadata['name'];
        $this->route = $metadata['route'];
    }

    public function getName()
    {
        return $this->name;
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
