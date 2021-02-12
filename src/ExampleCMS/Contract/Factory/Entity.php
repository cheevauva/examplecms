<?php

namespace ExampleCMS\Contract\Factory;

use ExampleCMS\Contract\Module;

interface Entity
{

    /**
     * @param string|array $id
     * @param \ExampleCMS\Contract\Module $module
     * @return \ExampleCMS\Contract\Application\Entity
     */
    public function makeById($id, \ExampleCMS\Contract\Module $module);

    /**
     * @param array $meta
     * @param \ExampleCMS\Contract\Module $module
     * @return \ExampleCMS\Contract\Application\Entity
     */
    public function makeByMetadata(array $meta, Module $module);
}
