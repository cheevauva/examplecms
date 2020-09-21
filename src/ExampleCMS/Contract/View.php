<?php

namespace ExampleCMS\Contract;

interface View
{

    /**
     * @return string
     */
    public function getContent();

    /**
     * @param array $metadata
     */
    public function setMetadata(array $metadata);
}
