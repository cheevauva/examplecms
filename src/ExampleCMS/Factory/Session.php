<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Session implements \ExampleCMS\Contract\Factory\Session
{

    /**
     * @var \ExampleCMS\Contract\Container
     */
    public $container;

    /**
     * @var \ExampleCMS\Contract\Config
     */
    public $config;

    public function get($id)
    {
        $engine = $this->config->get(['base', 'session', 'engine']);

        if (empty($engine)) {
            $engine = 'File';
        }

        $session = $this->container->create(sprintf('ExampleCMS\Session\%s', $engine));
        $session->setSessionId($id);

        return $session;
    }

}
