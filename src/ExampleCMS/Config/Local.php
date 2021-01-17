<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Config;

class Local implements \ExampleCMS\Contract\Config
{

    /**
     * @var array
     */
    protected $properties = null;

    /**
     * @var \ExampleCMS\Helper\ArrayHelper
     */
    public $arrayHelper;

    /**
     * @var \ExampleCMS\Contract\Filesystem
     */
    public $filesystem;
    
    /**
     * @var bool 
     */
    protected $isConfigured = false;

    /**
     * @param array|string $path
     * @param mixed $default
     * @return mixed
     */
    public function get($path)
    {
        $this->load();

        $path = $this->parsePath($path);

        $value = $this->properties;

        $cursors = array();

        foreach ($path as $cursor) {
            $cursors[] = $cursor;

            if (!isset($value[$cursor])) {
                return null;
            }

            $value = & $value[$cursor];
        }

        return $value;
    }

    public function has($path)
    {
        $this->load();

        $path = $this->parsePath($path);

        $value = $this->properties;

        $cursors = array();

        foreach ($path as $cursor) {
            $cursors[] = $cursor;

            if (!isset($value[$cursor])) {
                return false;
            }

            $value = & $value[$cursor];
        }

        return true;
    }

    public function load()
    {
        if (is_null($this->properties)) {
            $this->isConfigured = $this->filesystem->isExists('config.php');

            if ($this->isConfigured) {
                $this->properties = $this->filesystem->loadAsPHP('config.php');
            }
        }
    }

    public function save()
    {
        $phpArray = $this->arrayHelper->serializeToPHP($this->properties);

        $filename = $this->filesystem->preparePath('config.php');

        $phpArray = '<?php' . PHP_EOL . PHP_EOL . 'return ' . $phpArray . ';';

        file_put_contents($filename, $phpArray);

        $this->isConfigured = true;
    }

    public function set($path, $value)
    {
        $cursors = $this->parsePath($path);
        $firstCursor = current($cursors);

        $val = & $this->properties;

        foreach ($cursors as $cursor) {
            if (!isset($val[$cursor])) {
                $val[$cursor] = array();
            }

            $val = & $val[$cursor];
        }

        $val = $value;
    }

    protected function parsePath($path)
    {
        if (is_string($path)) {
            return explode('.', $path);
        }

        return $path;
    }

    public function isConfigured()
    {
        return $this->isConfigured;
    }

}
