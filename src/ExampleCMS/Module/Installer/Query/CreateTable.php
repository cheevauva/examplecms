<?php

namespace ExampleCMS\Module\Installer\Query;

use ExampleCMS\Query\DatabaseQuery;

class CreateTable extends DatabaseQuery
{
    public function execute()
    {
        var_dump(array_keys($this->config->get('modules')));
    }
}
