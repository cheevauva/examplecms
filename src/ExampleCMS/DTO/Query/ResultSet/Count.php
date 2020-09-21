<?php

namespace ExampleCMS\DTO\Query\ResultSet;

class Count extends \ExampleCMS\DTO\Query\ResultSet
{

    public function fetch()
    {
        $row = $this->fetchOneRaw();

        if (!is_array($row)) {
            return null;
        }

        return reset($row);
    }

}
