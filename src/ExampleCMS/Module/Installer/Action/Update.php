<?php

namespace ExampleCMS\Module\Installer\Action;

use ExampleCMS\Contract\Module\Installer\Query\FindFormModel;

class Update extends \ExampleCMS\Application\Action\Action
{

    public function execute(\ExampleCMS\Contract\Context $context)
    {
        $entityForm = $this->query('findFormModel')->fetch([
            FindFormModel::FORMS => $context->getAttribute('forms'),
            FindFormModel::FORM => $this->metadata['form'],
        ]);

        $entity = $this->query('find')->fetch();
        $entity->pull($entityForm);

        $save = $this->query('save');
        $save->execute([
            $save::MODEL => $entity,
        ]);

        $session = $context->getAttribute('session');
        $session->set('language', $entity->attribute('language_installer'));

        return $context;
    }

}
