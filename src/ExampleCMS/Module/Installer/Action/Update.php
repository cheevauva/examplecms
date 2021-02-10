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

        /* @var $entity \ExampleCMS\Contract\Application\Entity */
        $entity = $this->query('find')->fetch();
        $entity->pull($entityForm);
        $entity->apply();

        $context = $context->withAttribute($this->metadata['form'], $entityForm);

        if ($context->getAttribute('language') !== $entity->attribute('language_installer')) {
            $context = $context->withAttribute('language', $entity->attribute('language_installer'));
        }

        return $context;
    }

}
