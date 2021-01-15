<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS;

class Config implements \ExampleCMS\Contract\Config
{

    /**
     * @var string
     */
    protected $basePath;

    /**
     * @var array
     */
    protected $properties = null;

    /**
     * @var \ExampleCMS\Helper\ArrayHelper
     */
    protected $arrayHelper;

    /**
     *
     * @var \ExampleCMS\Filesystem
     */
    protected $filesystem;

    public function __construct(\ExampleCMS\Contract\Filesystem $filesystem, $arrayHelper)
    {
        $this->filesystem = $filesystem;
        $this->arrayHelper = $arrayHelper;
    }

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

    public function load()
    {
        if (is_null($this->properties)) {
            $this->properties = $this->filesystem->loadAsPHP('config.php');
        }
    }

    public function save()
    {
        $phpArray = $this->arrayHelper->serializeToPHP($this->properties);

        $filename = $this->basePath . 'config.php';

        $phpArray = '<?php' . PHP_EOL . PHP_EOL . 'return ' . $phpArray . ';';

        file_put_contents($filename, $phpArray);
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
        return file_exists($this->filesystem->preparePath('config.php'));
    }

}
