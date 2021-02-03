<?php

namespace ExampleCMS\Contract\Application;

interface Action
{

    /**
     * @param \ExampleCMS\Contract\Context $request
     * @return \ExampleCMS\Contract\Context
     */
    public function execute(\ExampleCMS\Contract\Context $request);

    public function setMetadata(array $metadata);

    public function setModule(\ExampleCMS\Contract\Module $module);
}
