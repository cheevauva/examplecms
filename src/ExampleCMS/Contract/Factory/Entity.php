<?php

namespace ExampleCMS\Contract\Factory;

interface Entity
{

    /**
     * @param string $id
     * @param \ExampleCMS\Contract\Module $module
     * @return \ExampleCMS\Contract\Application\Entity
     */
    public function get($id, \ExampleCMS\Contract\Module $module);
}
