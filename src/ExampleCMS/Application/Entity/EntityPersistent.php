<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Entity;

class EntityPersistent extends Entity
{

    protected function decodeMapperName()
    {
        return 'decodeStorage';
    }

    protected function encodeMapperName()
    {
        return 'encodeStorage';
    }

}
