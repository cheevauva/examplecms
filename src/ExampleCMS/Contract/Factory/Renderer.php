<?php

namespace ExampleCMS\Contract\Factory;

interface Renderer
{
    /**
     * @param string $id
     * @return \ExampleCMS\Contract\Renderer
     */
    public function get($id);
}
