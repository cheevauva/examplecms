<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Entity;

class EntityForm extends Entity
{

    protected function decodeMapperName()
    {
        return 'decodeUserScope';
    }

    protected function encodeMapperName()
    {
        return 'encodeUserScope';
    }

}
