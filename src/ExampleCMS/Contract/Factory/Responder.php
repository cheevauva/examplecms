<?php

namespace ExampleCMS\Contract\Factory;

interface Responder
{

    /**
     * @param \ExampleCMS\Contract\Module $module
     * @param string $type
     * @param string|array $name
     */
    public function get(\ExampleCMS\Contract\Module $module, $type, $name): \ExampleCMS\Contract\Responder;
}
