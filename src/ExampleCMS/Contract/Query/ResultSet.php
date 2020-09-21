<?php

namespace ExampleCMS\Contract\Query;

interface ResultSet
{

    public function __construct(array $rows);

    public function fetchMany();

    /**
     * @return array
     */
    public function fetchManyRaw();

    public function fetchOne();

    public function fetchOneRaw();

    /**
     * @return mixed
     */
    public function fetch();
}
