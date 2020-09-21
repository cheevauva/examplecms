<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Contract\Container;

interface UseServiceLocator
{

    public function setContainer(\ExampleCMS\Container\ServiceLocator $container);
}
