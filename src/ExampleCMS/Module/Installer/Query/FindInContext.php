<?php

namespace ExampleCMS\Module\Installer\Query;

use ExampleCMS\Contract\Module\Installer\Query\FindInContext as FindFormModelInterface;

class FindInContext extends \ExampleCMS\Application\Query\Query implements FindFormModelInterface
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
