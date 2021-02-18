<?php

namespace ExampleCMS\Contract;

interface Router
{

    public function setBaseUrl($baseUrl);

    public function make(array $location);

    public function match($requestUrl, $method);
}
