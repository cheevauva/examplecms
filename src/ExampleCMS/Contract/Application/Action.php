<?php

namespace ExampleCMS\Contract\Application;

interface Action
{

    /**
     * @param ServerRequestInterface $request
     * @return ServerRequestInterface
     */
    public function execute(\ExampleCMS\Contract\Context $request);

    public function setMetadata(array $metadata);

    public function setModule(\ExampleCMS\Contract\Module $module);
}
