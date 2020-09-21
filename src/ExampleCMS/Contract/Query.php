<?php

namespace ExampleCMS\Contract;

interface Query
{

    /**
     * @param mixed $params
     * @return \ExampleCMS\Contract\Query\ResultSet
     */
    public function execute($params = null);
}
