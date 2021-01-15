<?php

namespace ExampleCMS\Contract\Factory;

interface Theme
{
    /**
     * @param string $id
     * @return \ExampleCMS\Contract\Application\Theme
     */
    public function get($id);
}
