<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Contract\Factory;

interface MetadataHandler
{

    public function get($id): \ExampleCMS\Contract\Metadata\Handler;
}
