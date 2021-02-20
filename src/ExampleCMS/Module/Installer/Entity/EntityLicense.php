<?php

namespace ExampleCMS\Module\Installer\Entity;

class EntityLicense extends \ExampleCMS\Application\Entity\Entity
{

    public function isValid(): bool
    {
        return $this->isNotEmpty('license_accepted');
    }

}
