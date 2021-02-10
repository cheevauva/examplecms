<?php

namespace ExampleCMS\Module\Installer\Action;

use ExampleCMS\Contract\Module\Installer\Query\FindFormModel;

class Read extends \ExampleCMS\Application\Action\Action
{

    public function execute(\ExampleCMS\Contract\Context $context)
    {
        /* @var $entity \ExampleCMS\Contract\Application\Entity */
        $entity = $this->query('find')->fetch();

        $entityForm = $this->query('findFormModel')->fetch([
            FindFormModel::FORMS => $context->getAttribute('forms'),
            FindFormModel::FORM => $this->metadata['form'],
        ]);
        $entityForm->pull($entity);
        
        return $context->withEntity($this->metadata['model'], $entityForm);
    }

}
