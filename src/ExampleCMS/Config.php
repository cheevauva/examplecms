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
    protected $filesystem;

    /**
     * @param string $basePath
     */
    public function __construct($filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @param array|string $path
     * @return mixed
     */
    public function get($path)
    {
        if (empty($path)) {
            return $this->loadProperties();
        }

        $path = $this->parsePath($path);

        $property = array_shift($path);
        $value = $this->loadProperty($property);
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

    protected function loadProperties()
    {
        $files = $this->filesystem->glob('config/*.php');

        foreach ($files as $file) {
            $property = substr(str_replace($this->filesystem->getBasePath() . 'config/', null, $file), 0, -4);
            $this->loadProperty($property);
        }

        return $this->properties;
    }

    protected function loadProperty($property)
    {
        if (!isset($this->properties[$property])) {
            $filename = 'config/' . $property . '.php';

            if (!$this->filesystem->isExists($filename)) {
                $this->properties[$property] = array();
                throw new \Exception(sprintf('file "%s" is not found', $filename));
            }

            $this->properties[$property] = $this->filesystem->loadAsPHP($filename);
        }

        return $this->properties[$property];
    }

    protected function saveProperty($property)
    {
        $phpArray = $this->arrayUtil->serializeToPHP($this->properties[$property]);

        $filename = $this->basePath . 'config/' . $property . '.php';

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

        $this->loadProperty($firstCursor);

        $val = & $this->properties;

        foreach ($cursors as $cursor) {
            if (!isset($val[$cursor])) {
                $val[$cursor] = array();
            }

            $val = & $val[$cursor];
        }

        $val = $value;

        $this->saveProperty($firstCursor);
    }

    protected function delete($path)
    {
        $val = & $this->properties;

        $cursors = explode('.', $path);
        $delete = array_pop($cursors);

        foreach ($cursors as $cursor) {
            if (!isset($val[$cursor])) {
                $val[$cursor] = array();
            }

            $val = & $val[$cursor];
        }

        unset($val[$delete]);
    }

    protected function parsePath($path)
    {
        if (is_string($path)) {
            return explode('.', $path);
        }

        return $path;
    }

}
