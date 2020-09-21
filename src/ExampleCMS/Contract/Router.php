<?php

namespace ExampleCMS\Contract;

interface Router
{

    public function make($route, array $params = array());

    public function process($request);

    public function getRoute($route);
}
