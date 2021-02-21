<?php

namespace ExampleCMS\Application\Action;

class CRUDUpdate extends Action
{

    public function execute(\ExampleCMS\Contract\Context $context)
    {
        $entityForm = $this->query('find-in-context')->fetch([
            \ExampleCMS\Contract\Application\Query\FindByIdInContext::CONTEXT => $context,
            \ExampleCMS\Contract\Application\Query\FindByIdInContext::ID => $this->metadata['form'],
        ])->entity();
        
      
        $entity = $this->query('find-by-id')->fetch([
            \ExampleCMS\Contract\Application\Query\FindById::ID => $context->getAttribute('id'),
        ])->entity();

        $entity->pull($entityForm);
        $entity->apply();

        $context = $entity->mapping('language2context', [
            'context' => $context
        ]);

        return $context->withEntity($this->metadata['form'], $entityForm);
    }

}
