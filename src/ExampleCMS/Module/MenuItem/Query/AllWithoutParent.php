<?php

namespace ExampleCMS\Module\MenuItem\Query;

class AllWithoutParent extends \ExampleCMS\Query\Database\All
{
    protected function getPlainSql()
    {
        return "SELECT * FROM `<table>` WHERE menuitem_id IS NULL";
    }
}
