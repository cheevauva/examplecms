<?php

namespace ExampleCMS\Module\Installer\Action;

use ExampleCMS\Contract\Module\Installer\Query\FindInContext;

class Read extends \ExampleCMS\Application\Action\Action
{

    public function execute(\ExampleCMS\Contract\Context $context)
    {
        $entity = $this->query('find')->fetch()->entity();

        $entityForm = $this->query('find-in-context')->fetch([
            FindInContext::CONTEXT => $context,
            FindInContext::ID => $this->metadata['entity'],
        ])->entity();
        $entityForm->pull($entity);
        
        return $context->withEntity($this->metadata['entity'], $entityForm);
    }

}
