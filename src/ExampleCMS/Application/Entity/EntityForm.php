<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Entity;

class EntityForm extends Entity
{

    public function setMeta($metadata)
    {
        parent::setMeta($metadata);

        if (empty($this->meta[static::MAPPER_TO_MODEL])) {
            $this->meta[static::MAPPER_TO_MODEL] = 'userScopeToModelForm';
        }

        if (empty($this->meta[static::MAPPER_FROM_MODEL])) {
            $this->meta[static::MAPPER_FROM_MODEL] = 'userScopeFromModelForm';
        }
    }

}
