<?php

namespace ExampleCMS\Contract;

interface Builder
{

    /**
     * @param string $id
     * @param array $args
     * @return object
     */
    public function make($id, array $args = []);
}
