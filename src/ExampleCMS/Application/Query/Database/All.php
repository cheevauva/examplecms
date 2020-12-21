<?php

namespace ExampleCMS\Query\Database;

class All extends Query
{

    protected function getPlainSql()
    {
        return "SELECT * FROM `<table>`";
    }
}
