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

        $entityForm2 = $this->query('find-in-context')->fetch([
            FindInContext::CONTEXT => $context,
            FindInContext::ID => $this->metadata['entity'],
        ])->entity();

//        var_dump($entity->attach('items', $entityForm2)->encode()); // Не забыть удалить в будущем
//        var_dump($entity->detach('items', $entityForm2)->encode());
//        $entity->apply();

        return $context->withEntity($this->metadata['entity'], $entityForm);
    }

}
