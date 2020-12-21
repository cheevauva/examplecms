<?php

namespace ExampleCMS\Query\Database;

class Count extends \ExampleCMS\Query\Database\Query
{

    protected function prepareResultSet(array $rows = array())
    {
        return new \ExampleCMS\DTO\Query\ResultSet\Count($rows);
    }

    protected function getPlainSql()
    {
        return "SELECT COUNT(*) AS count FROM `<table>`";
    }

}
