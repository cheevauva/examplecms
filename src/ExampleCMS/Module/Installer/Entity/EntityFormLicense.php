<?php

namespace ExampleCMS\Module\Installer\Entity;

class EntityFormLicense extends \ExampleCMS\Application\Entity\EntityForm
{

    public function isValid()
    {
        return $this->isNotEmpty('license_accepted');
    }

}
