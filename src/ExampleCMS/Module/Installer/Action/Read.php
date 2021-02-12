<?php

namespace ExampleCMS\Module\Installer\Action;

use ExampleCMS\Contract\Module\Installer\Query\FindFormModel;

class Read extends \ExampleCMS\Application\Action\Action
{

    public function execute(\ExampleCMS\Contract\Context $context)
    {
        $entity = $this->query('find')->fetch()->entity();

        $entityForm = $this->query('findFormModel')->fetch([
            FindFormModel::FORMS => $context->getAttribute('forms'),
            FindFormModel::FORM => $this->metadata['form'],
        ])->entity();
        $entityForm->pull($entity);
        
        return $context->withEntity($this->metadata['model'], $entityForm);
    }

}
