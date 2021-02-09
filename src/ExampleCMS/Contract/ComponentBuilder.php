<?php

namespace ExampleCMS\Contract;

interface ComponentBuilder
{

    /**
     * @param string $id
     * @param array $args
     * @return object
     */
    public function make($id, $args = []);
}
