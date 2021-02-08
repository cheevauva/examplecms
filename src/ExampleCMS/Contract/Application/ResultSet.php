<?php

namespace ExampleCMS\Contract\Application;

use ExampleCMS\Contract\Collection;
use ExampleCMS\Contract\Application\Entity;

interface ResultSet
{

    /**
     * @return Collection
     */
    public function collection();

    /**
     * @return Entity|null
     */
    public function entity();

    /**
     * @return array
     */
    public function rows();

    /**
     * @return array
     */
    public function row();

    /**
     * @return mixed
     */
    public function value();

    /**
     * @return array
     */
    public function assocRows();

    /**
     * @return int
     */
    public function count();
}
