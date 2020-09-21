<?php

namespace ExampleCMS\Query\Database;

class Fetch extends \ExampleCMS\Query\Database\Query
{

    /**
     * @var \ExampleCMS\DTO\Query\Database\Fetch
     */
    protected $dto;

    protected function setDTO(\ExampleCMS\DTO\Query\Database\Fetch $dto)
    {
        parent::setDTO($dto);
    }

    protected function getPlainSql()
    {
        return "SELECT * FROM <table> WHERE id = :id";
    }

}
