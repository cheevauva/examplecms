<?php

namespace ExampleCMS\Query\Database;

class Delete extends \ExampleCMS\Query\Database\Fetch
{

    protected function getPlainSql()
    {
        return "DELETE FROM <table> WHERE id = :id";
    }
}
