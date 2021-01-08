<?php

$di[ExampleCMS\Application\Middleware\Web\Session::class] = array(
    'sessionFactory' => 'ExampleCMS\Factory\Session',
    'config' => 'ExampleCMS\Config',
);
$di[ExampleCMS\Application\Middleware\BasePath::class] = array(
    'config' => 'ExampleCMS\Config',
);
$di[ExampleCMS\Application\Middleware\Router::class] = array(
    'routerFactory' => 'ExampleCMS\Factory\Router',
    'config' => 'ExampleCMS\Config',
);
$di[ExampleCMS\Application\Middleware\Web\FrontController::class] = array(
    'metadata' => 'ExampleCMS\Metadata',
    'moduleFactory' => 'ExampleCMS\Factory\Module',
    'themeFactory' => 'ExampleCMS\Factory\Theme',
    'config' => 'ExampleCMS\Config',
);
$di[ExampleCMS\Application\Middleware\CLI\FrontController::class] = array(
    'metadata' => 'ExampleCMS\Metadata',
    'config' => 'ExampleCMS\Config',
);
$di[ExampleCMS\Application\Middleware\Web\OopsHandler::class] = array(
    'moduleFactory' => 'ExampleCMS\Factory\Module',
    'themeFactory' => 'ExampleCMS\Factory\Theme',
    'config' => 'ExampleCMS\Config',
);
