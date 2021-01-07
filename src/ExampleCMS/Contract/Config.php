<?php

namespace ExampleCMS\Contract;

interface Config extends GetterSetter
{

    /**
     * @return bool
     */
    public function isConfigured();
}
