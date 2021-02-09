<?php

namespace ExampleCMS\Contract;

interface ComponentBuilder
{

    /**
     * @param object $id
     */
    public function make($id);
}
