<?php

namespace ExampleCMS\Module\Installer\Query;

class Save extends \ExampleCMS\Application\Query\QueryWithEntity
{

    use CacheTrait;

    public function execute(array $params = [])
    {
        $this->set('installer', $this->entity->encode());
    }

}
