<?php

namespace ExampleCMS\Contract;

interface Module
{

    /**
     * @return string
     */
    public function getName();

    public function getComponentIdByAlias($alias);
}
