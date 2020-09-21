<?php

namespace ExampleCMS\Metadata\Handler;

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

    protected function getDefault()
    {
        if (!$this->default) {
            $this->default = $this->get(array('default'));
        }

        return $this->default;
    }

    public function get(array $path)
    {
        $level = array_shift($path);

        $path = str_replace('$1', $level, $this->path);

        if (!$this->filesystem->isExists($path)) {
            return;
        }

        $array = $this->filesystem->loadAsPHP($path);

        return new Basic\MetadataArray($array, $level !== 'default' ? $this->getDefault() : array());
    }

}
