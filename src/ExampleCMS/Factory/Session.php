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

    public function get($id)
    {
        $session = $this->container->create('ExampleCMS\\Session\\File');
        $session->setSessionId($id);

        return $session;
    }

}
