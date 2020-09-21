<?php

namespace ExampleCMS\DTO\Query;

class ResultSet implements \ExampleCMS\Contract\Query\ResultSet
{

    /**
     * @var array
     */
    protected $rows = array();

    public function __construct(array $rows)
    {
        $this->rows = $rows;
    }

    /**
     * @return array
     */
    public function fetchManyRaw()
    {
        return $this->rows;
    }

    /**
     * @return mixed
     */
    public function fetchOneRaw()
    {
        return reset($this->rows);
    }

    public function fetch()
    {
        return $this->fetchOneRaw();
    }

    /**
     * @return array
     */
    public function fetchMany()
    {
        return $this->fetchManyRaw();
    }

    /**
     * @return mixed
     */
    public function fetchOne()
    {
        return $this->fetchOneRaw();
    }

}
