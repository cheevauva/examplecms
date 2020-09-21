<?php

namespace ExampleCMS\DTO\Query\Database;

class Fetch implements \ExampleCMS\Contract\DTO
{

    /**
     * @var string|id
     */
    protected $id;

    /**
     * @var \ExampleCMS\Contract\Entity
     */
    protected $entity;

    public function getId()
    {
        return $this->id;
    }

    public function setEntity(\ExampleCMS\Contract\Entity $entity)
    {
        $this->setId($entity->id);

        return $this;
    }

    public function setId(id $id)
    {
        $this->id = $id;

        return $this;
    }

    public function test()
    {
        if (empty($this->id)) {
            throw new \UnexpectedValueException('id is not defined');
        }
    }

}
