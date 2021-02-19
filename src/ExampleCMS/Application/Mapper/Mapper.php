<?php

namespace ExampleCMS\Application\Mapper;

abstract class Mapper implements \ExampleCMS\Contract\Application\Mapper
{

    /**
     * @var array
     */
    protected $metadata;

    public function __construct(array $metadata)
    {
        $this->metadata = $metadata;
    }

}
