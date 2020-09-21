<?php

namespace ExampleCMS\Query\Database;

class Find extends \ExampleCMS\Query\Database\Query
{

    protected function getReplaceData()
    {
        $replaceData = parent::getReplaceData();

        foreach ($this->params as $field => $value) {
            $criteria[] = $field . ' = :' . $field;
            $this->parameters[':' . $field] = $value;
        }

        $replaceData['criteria'] = implode(' AND ', $criteria);

        return $replaceData;
    }

    protected function getPlainSql()
    {
        return "SELECT * FROM <table> WHERE <criteria>";
    }
}
