<?php

namespace ExampleCMS\Application\Action;

class RedirectWhenInvalidEntity extends Redirect
{

    public function execute(\ExampleCMS\Contract\Context $context): \ExampleCMS\Contract\Context
    {
        if (!$context->hasEntity($this->metadata['entity'])) {
            throw new \Exception(sprintf('entity "%s" not defined in context', $this->metadata['entity']));
        }

        $entity = $context->getEntity($this->metadata['entity']);

        if ($entity->isValid()) {
            return $context;
        }

        return $context->withAttribute('location', [
            $this->metadata['route'],
            $entity->attributes()
        ]);
    }

}
