<?php

namespace ExampleCMS\Contract\Application;

interface Query
{

    public function setModule(\ExampleCMS\Contract\Module $module);

    public function execute(array $params = [], $autoExecute = true);

    public function fetch(array $params = []);
}
