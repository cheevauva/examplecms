<?php

namespace ExampleCMS\Contract\Application;

use ExampleCMS\Contract\Application\ResultSet;

interface Query
{

    public function setModule(\ExampleCMS\Contract\Module $module);

    /**
     * @param array $params
     * @return void
     */
    public function execute(array $params = []);

    /**
     * 
     * @param array $params
     * @return ResultSet
     */
    public function fetch(array $params = []);
}
