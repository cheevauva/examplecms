<?php

namespace ExampleCMS\Module\Installer\Query;

use ExampleCMS\Contract\Module\Installer\Query\FindInContext as FindFormModelInterface;

class FindInContext extends \ExampleCMS\Application\Query\Query implements FindFormModelInterface
{

    public function fetch(array $params = [])
    {
        $entity = $this->entity($params[static::FORM]);
        $entity->decode($params[static::FORMS][$entity->entityName()] ?? null);

        return new \ExampleCMS\Application\ResultSet\Entity($entity);
    }

}
