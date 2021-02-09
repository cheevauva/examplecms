<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Entity;

class EntityForm extends Entity
{

    public function __construct(\ExampleCMS\Contract\Module $module, array $metadata)
    {
        if (empty($metadata[static::MAPPER_TO_MODEL])) {
            $metadata[static::MAPPER_TO_MODEL] = 'userScopeToModelForm';
        }

        if (empty($metadata[static::MAPPER_FROM_MODEL])) {
            $metadata[static::MAPPER_FROM_MODEL] = 'userScopeFromModelForm';
        }

        parent::__construct($module, $metadata);
    }

}
