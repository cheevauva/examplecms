<?php

namespace ExampleCMS\Application\ResultSet;

class Entity implements \ExampleCMS\Contract\Application\ResultSet
{

    protected $entity;
    protected $collection;

    public function __construct($entity)
    {
        $this->entity = $entity;

        $this->collection = new \ExampleCMS\Collection();
        $this->collection->add($entity);
    }

    public function assocRows(): array
    {
        return $this->entity->attributes();
    }

    public function collection(): \ExampleCMS\Contract\Collection
    {
        return $this->collection;
    }

    public function count(): int
    {
        return 1;
    }

    public function entity()
    {
        return $this->entity;
    }

    public function row(): array
    {
        return array_values($this->assocRows());
    }

    public function rows(): array
    {
        return [
            $this->row(),
        ];
    }

    public function value()
    {
        return $this->entity->attribute('id');
    }

}
