<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Model;

class ModelBase extends Model
{

    public function setMetadata($metadata)
    {
        parent::setMetadata($metadata);

        if (empty($this->metadata[static::MAPPER_TO_MODEL])) {
            $this->metadata[static::MAPPER_TO_MODEL] = 'storage2modelbase';
        }

        if (empty($this->metadata[static::MAPPER_FROM_MODEL])) {
            $this->metadata[static::MAPPER_FROM_MODEL] = 'modelbase2storage';
        }
    }

}
