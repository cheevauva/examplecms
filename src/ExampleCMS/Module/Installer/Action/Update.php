<?php

namespace ExampleCMS\Module\Installer\Action;

use ExampleCMS\Contract\Module\Installer\Query\FindInContext;

class Update extends \ExampleCMS\Application\Action\Action
{

    public function execute(\ExampleCMS\Contract\Context $context)
    {
        $entityForm = $this->query('find-in-context')->fetch([
            FindInContext::FORMS => $context->getAttribute('forms'),
            FindInContext::FORM => $this->metadata['form'],
        ])->entity();

        $entity = $this->query('find')->fetch()->entity();
        $entity->pull($entityForm);
        $entity->apply();
        
        $context = $entity->mapping('language2context', [
            'context' => $context
        ]);

        return $context->withEntity($this->metadata['form'], $entityForm);
    }

}
