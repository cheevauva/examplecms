<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Contract\Application;

interface Theme
{

    public function render(array $data);
}
