<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS;

class Bootstrap
{

    /**
     * @var string 
     */
    protected $appName;

    /**
     * @var string
     */
    protected $basePath;

    /**
     * @var \ExampleCMS\Filesystem
     */
    protected $filesystem;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    protected $config;

    public function __construct($appName, $basePath)
    {
        $this->appName = $appName;
        $this->basePath = $basePath;
    }

    public function includeXhprof()
    {
        if (!$this->config->get('base.xhprof.enable')) {
            return;
        }

        if (function_exists('xhprof_enable') && class_exists('XHProfRuns_Default', true)) {
            xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

            register_shutdown_function(function () {
                $xhprof_data = xhprof_disable();
                $xhprof_runs = new \XHProfRuns_Default();
                $xhprof_runs->save_run($xhprof_data, "examplecms");
            });
        }
    }

    public function getFilesystem()
    {
        if (empty($this->filesystem)) {
            $this->filesystem = new \ExampleCMS\Filesystem($this->basePath);
        }

        return $this->filesystem;
    }

    protected function getDefaultConfig()
    {
        return array(
            'language' => 'en_US',
            'theme' => 'default',
            'module' => 'Default',
            'session' => [
                'name' => 'EXAMPLECMSID',
                'engine' => 'File',
            ],
            'xhprof' => array(
                'enable' => false,
            ),
            'semantic_url' => false,
            'setup' => true,
            'logger' => array(
                'name' => 'examplecms',
                'level' => 'ERROR',
                'path' => 'examplecms.log'
            ),
            'cache' => array(
                'engine' => 'memory',
            ),
        );
    }

    public function getConfig()
    {
        if (empty($this->config)) {
            $config = new \ExampleCMS\Config($this->getFilesystem());

            try {
                $config->get('base');
            } catch (\Exception $exception) {
                $config->arrayUtil = new \ExampleCMS\Util\Arr;
                $config->set('base', $this->getDefaultConfig());
                $config->save();
            }

            $this->config = $config;
        }

        return $this->config;
    }

    public function getContainer()
    {
        if (empty($this->container)) {
            $filesystem = $this->getFilesystem();
            $config = $this->getConfig();

            $injections = $filesystem->loadAsPHP('cache/metadata/application/DI.php');

            $container = new \ExampleCMS\Container($injections, array(
                get_class($filesystem) => $filesystem,
                get_class($config) => $config,
                get_class($this) => $this,
            ));

            $this->container = $container;
        }

        return $this->container;
    }

    /**
     * @param string $app
     * @param string $basePath
     * @return \ExampleCMS\Contract\Application
     */
    public function getApplication()
    {
        $this->getConfig();
        $this->includeXhprof();

        return $this->getContainer()->get('ExampleCMS\\Application');
    }

    /**
     * @return string
     */
    public function getAppName()
    {
        return $this->appName;
    }

}
