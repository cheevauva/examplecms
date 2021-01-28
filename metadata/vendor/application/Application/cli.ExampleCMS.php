<?php

$application['middleware']['ExampleCMS\Application\Middleware\CLI\OopsHandler'] = 100;
$application['middleware']['ExampleCMS\Application\Middleware\Router'] = 300;
$application['middleware']['ExampleCMS\Application\Middleware\CLI\FrontController'] = 500;
