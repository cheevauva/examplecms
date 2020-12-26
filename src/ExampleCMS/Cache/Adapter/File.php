<?php

namespace ExampleCMS\Cache\Adapter;

class File extends Adapter
{

    /**
     * @var \ExampleCMS\Contract\Filesystem
     */
    public $filesystem;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    protected function preparePath($key)
    {
        return $this->filesystem->preparePath($this->options['basePath'] . $key . '.php');
    }

    public function get($key)
    {
        $filename = $this->preparePath($key);

        opcache_invalidate($filename);

        if (!file_exists($filename)) {
            return null;
        }

        return include $filename;
    }

    public function set($key, $value)
    {
        $filename = $this->preparePath($key);

        if (!is_dir(dirname($filename))) {
            mkdir(dirname($filename), 0777, true);
        }


        file_put_contents($filename, "<?php\nreturn " . var_export($value, true) . ';');
    }

}
