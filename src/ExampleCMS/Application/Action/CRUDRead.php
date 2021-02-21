<?php

namespace ExampleCMS\Application\Action;

class CRUDRead extends Action
{

    public function execute(\ExampleCMS\Contract\Context $context)
    {
        $entity = $this->query('find-by-id')->fetch([
            \ExampleCMS\Contract\Application\Query\FindById::ID => $context->getAttribute('id'),
        ])->entity();

        $entityForm = $this->query('find-in-context')->fetch([
            \ExampleCMS\Contract\Application\Query\FindByIdInContext::CONTEXT => $context,
            \ExampleCMS\Contract\Application\Query\FindByIdInContext::ID => $this->metadata['entity'],
        ])->entity();
        $entityForm->pull($entity);

        return $context->withEntity($this->metadata['entity'], $entityForm);
    }

}
