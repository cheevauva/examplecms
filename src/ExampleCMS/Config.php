<?php

namespace ExampleCMS;

class Config
{

    /**
     * @var \ExampleCMS\Contract\Factory\Config
     */
    public $configFactory;

    public function __invoke()
    {
        /* @var $config \ExampleCMS\Contract\Config */
        $config = null;
        $localConfig = $this->configFactory->get('local');

        if (!$localConfig->has('type')) {
            $localConfig->set('type', 'local');
        }

        $type = $localConfig->get('type');

        switch ($type) {
            case 'local':
                $config = $localConfig;
                break;
            default:
                $config = $this->configFactory->get($type, [
                    'config' => $localConfig,
                ]);
                break;
        }

        if (!$config->isConfigured()) {
            $config->set('base', $this->getDefaultConfig());
            $config->save();
        }

        return $config;
    }

    protected function getDefaultConfig()
    {
        return array(
            'language' => 'en_US',
            'renderer' => 'default',
            'module' => 'Default',
            'session' => [
                'name' => 'EXAMPLECMSID',
                'engine' => 'sessionOverFile',
                'basePath' => 'cache/sessions/',
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

}
