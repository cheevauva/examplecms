<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Entity;

class EntityPersistent extends Entity
{

    public function __construct(\ExampleCMS\Contract\Module $module, array $metadata)
    {
        if (empty($metadata[static::MAPPER_TO_MODEL])) {
            $metadata[static::MAPPER_TO_MODEL] = 'baseFromStorage';
        }

        if (empty($metadata[static::MAPPER_FROM_MODEL])) {
            $metadata[static::MAPPER_FROM_MODEL] = 'baseToStorage';
        }
        
        parent::__construct($module, $metadata);
    }

}
