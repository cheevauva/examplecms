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
        ])->entity();

        $entity = $this->query('find')->fetch()->entity();
        $entity->pull($entityForm);
        $entity->apply();

        $context = $context->withEntity($this->metadata['form'], $entityForm);
        $context = $context->withAttribute('language', $entity->attribute('language_installer'));

        return $context;
    }

}
