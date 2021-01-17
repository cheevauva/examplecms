<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS;

use Psr\Http\Message\ResponseInterface;

class Bootstrap
{

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    /**
     * @var \ExampleCMS\Contract\Application
     */
    public $application;

    public function includeXhprof()
    {
        if (!$this->config->get('base.xhprof.enable')) {
            return;
        }

        if (function_exists('xhprof_enable') && class_exists('XHProfRuns_Default', true)) {
            xhprof_enable(constant('XHPROF_FLAGS_CPU') + constant('XHPROF_FLAGS_MEMORY'));

            register_shutdown_function(function () {
                $xhprof_data = xhprof_disable();
                $xhprof_runs = new \XHProfRuns_Default();
                $xhprof_runs->save_run($xhprof_data, "examplecms");
            });
        }
    }

    /**
     * @param string $app
     * @return \ExampleCMS\Contract\Application
     */
    public function getApplication()
    {
        $this->includeXhprof();

        return $this->application;
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
