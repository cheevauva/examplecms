<?php

namespace ExampleCMS\Module\Installer\Entity;

class EntityLicense extends \ExampleCMS\Application\Entity\Entity
{

    public function isValid()
    {
        return $this->isNotEmpty('license_accepted');
    }

}
