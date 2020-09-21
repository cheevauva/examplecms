<?php

namespace ExampleCMS\Database;

class Connection extends \PDO
{

    public function fetchAll($query)
    {
        return $this->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchAssoc($query)
    {
        return $this->query($query)->fetch(\PDO::FETCH_ASSOC);
    }
}
