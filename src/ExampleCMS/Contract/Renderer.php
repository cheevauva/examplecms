<?php

/**
 * ExampleCMS
 *
 * @license LICENCE/ExampleCMS
 */

namespace ExampleCMS\Contract;

interface Renderer
{

    public function execute(array $data);

    public function setRequest(\Psr\Http\Message\ServerRequestInterface $request);
}
