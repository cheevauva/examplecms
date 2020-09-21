<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Factory;

class Theme extends Factory
{

    public function get($theme)
    {
        $aliases = array(
            'default' => 'ExampleCMS\\Responder\\Theme\\Basic',
        );
        
        $object = $this->container->get($aliases[$theme]);
        $object->setTheme($theme);

        return $object;
    }
}
