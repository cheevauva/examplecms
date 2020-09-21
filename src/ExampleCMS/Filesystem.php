<?php

namespace ExampleCMS;

class Filesystem
{

    protected $basePath;

    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * @param string $filename
     * @return mixed
     */
    public function loadAsPHP($filename)
    {
        return include $this->preparePath($filename);
    }

    public function isExists($filename)
    {
        return file_exists($this->preparePath($filename));
    }

    public function glob($pattern, $flags)
    {
        return glob($this->preparePath($pattern), $flags);
    }

    public function preparePath($path)
    {
        return $this->basePath . $path;
    }

    public function getBasePath()
    {
        return $this->basePath;
    }

    public function mkdir($pathname, $mode, $recursive, $context)
    {
        return mkdir($this->preparePath($pathname), $mode, $recursive, $context);
    }

}
