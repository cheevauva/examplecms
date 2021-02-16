<?php

/**
 * @license LICENCE
 */

namespace ExampleCMS\Contract;

interface Config
{

    /**
     * @return bool
     */
    public function isConfigured();

    /**
     * @param string|array $path
     * @return mixed
     */
    public function get($path, $default = null);

    public function load();

    public function save();

    /**
     * @param string|array $path
     * @param mixed $value
     */
    public function set($path, $value);
}
