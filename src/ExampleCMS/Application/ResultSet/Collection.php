<?php

namespace ExampleCMS\Application\ResultSet;

class Collection implements \ExampleCMS\Contract\Application\ResultSet
{

    protected $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
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
