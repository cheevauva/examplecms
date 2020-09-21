<?php

namespace ExampleCMS\DTO\Query\Database;

class Create implements \ExampleCMS\Contract\DTO
{

    /**
     * @var array
     */
    protected $fields;

    public function test()
    {
        if (empty($this->fields)) {
            throw new \UnexpectedValueException('field is not defined');
        }
    }

    public function setModel($model)
    {
        $this->setFields($this->getDatabaseFields($model));
    }

    /**
     * @param array $fields
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

}
