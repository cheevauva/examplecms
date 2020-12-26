<?php

$applications['middleware']['ExampleCMS\Application\Middleware\BasePath'] = 100;
$applications['middleware']['ExampleCMS\Application\Middleware\Web\Session'] = 200;
$applications['middleware']['ExampleCMS\Application\Middleware\Rest\OopsHandler'] = 300;
$applications['middleware']['ExampleCMS\Application\Middleware\Router'] = 400;
$applications['middleware']['ExampleCMS\Application\Middleware\Rest\FrontController'] = 500;
