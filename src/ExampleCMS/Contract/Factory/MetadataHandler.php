<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Contract\Factory;

interface MetadataHandler
{

    /**
     * @param type $id
     * @return \ExampleCMS\Contract\Metadata\Handler
     */
    public function get($id);
}
