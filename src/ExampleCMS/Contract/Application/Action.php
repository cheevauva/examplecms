<?php

namespace ExampleCMS\Contract\Application;

use Psr\Http\Message\ServerRequestInterface;

interface Action
{

    /**
     * @param ServerRequestInterface $request
     * @return ServerRequestInterface
     */
    public function execute(ServerRequestInterface $request);

    public function setMetadata(array $metadata);
}
