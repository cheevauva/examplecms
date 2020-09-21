<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Contract;

interface EventManager
{

    /**
     * @param object $object
     * @param event $string
     */
    public function notify($object, $event);
}
