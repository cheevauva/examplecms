<?php

namespace ExampleCMS\Application\Query;

class FindByIdInContext extends \ExampleCMS\Application\Query\Query implements \ExampleCMS\Contract\Application\Query\FindByIdInContext
{

    public function fetch(array $params = [])
    {
        /* @var $context \ExampleCMS\Contract\Context */
        $context = $params[static::CONTEXT];
        $forms = $context->getAttribute('forms', []);

        $entity = $this->entity($params[static::ID]);
        $entity->decode($forms[$entity->entityName()] ?? null);

        return new \ExampleCMS\Application\ResultSet\Entity($entity);
    }

}
