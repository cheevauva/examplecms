<?php

namespace ExampleCMS\Contract\Application;

interface Mapper
{

    /**
     * @param mixed $data
     * @return mixed
     */
    public function execute($data);
}
