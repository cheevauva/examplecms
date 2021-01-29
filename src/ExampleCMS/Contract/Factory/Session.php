<?php

namespace ExampleCMS\Contract\Factory;

interface Session
{

    /**
     * @param $id string
     * @return \ExampleCMS\Contract\Session
     */
    public function get($id);
}
