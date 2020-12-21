<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
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
    protected $properties = array();

    /**
     * @var \ExampleCMS\Util\Arr
     */
    public $arrayUtil;

    /**
     *
     * @var \ExampleCMS\Filesystem
     */
    protected $filesystem;

    /**
     * @param string $basePath
     */
    public function __construct($filesystem)
    {
        $this->filesystem = $filesystem;
        $this->properties = $this->load();
    }

    /**
     * @param array|string $path
     * @param mixed $default
     * @return mixed
     */
    public function get($path)
    {
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
        return $this->filesystem->loadAsPHP('config.php');
    }

    public function save()
    {
        $phpArray = $this->arrayUtil->serializeToPHP($this->properties);

        $filename = $this->basePath . 'config.php';

        $phpArray = '<?php' . PHP_EOL . PHP_EOL . 'return ' . $phpArray . ';';

        file_put_contents($filename, $phpArray);
    }

    /**
     * @param string $path
     * @param mixed $value
     * @return bool
     */
    public function set($path, $value = null)
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

}
