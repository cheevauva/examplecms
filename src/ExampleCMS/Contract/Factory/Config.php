<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Contract\Factory;

interface Config
{

    /**
     * @param type $id
     * @param array $options
     * @return ExampleCMS\Contract\Config
     */
    public function get($id, array $options = []);
}
