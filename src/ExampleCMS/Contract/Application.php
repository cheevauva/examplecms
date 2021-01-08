<?php

namespace ExampleCMS\Contract;

use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;

interface Application
{

    public function run(ServerRequestInterface $request): ResponseInterface;
}
