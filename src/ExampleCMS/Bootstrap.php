<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS;

use Psr\Http\Message\ResponseInterface;

class Bootstrap
{

    /**
     * @var \ExampleCMS\Contract\Filesystem
     */
    protected $filesystem;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    protected $config;

    /**
     * @var \Psr\Container\ContainerInterface
     */
    protected $container;

    public function __construct($basePath)
    {
        $arrayHelper = new \ExampleCMS\Helper\ArrayHelper;

        $this->filesystem = new Filesystem($basePath);
        $this->config = new Config($this->filesystem, $arrayHelper);

        $injections = $this->filesystem->loadAsPHP('cache/metadata/application/DI.php');

        $this->container = new Container($injections, [
            get_class($this->filesystem) => $this->filesystem,
            get_class($this->config) => $this->config,
            get_class($arrayHelper) => $arrayHelper,
        ]);
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

    /**
     * @param string $app
     * @return \ExampleCMS\Contract\Application
     */
    public function getApplication()
    {
        if (!$this->config->isConfigured()) {
            $this->config->set('base', $this->getDefaultConfig());
            $this->config->save();
        }

        $this->includeXhprof();

        return $this->container->get('ExampleCMS\Application');
    }

    public function sendResponse(ResponseInterface $response)
    {
        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                header(sprintf('%s: %s', $name, $value), false);
            }
        }

        echo $response->getBody();
    }

}
