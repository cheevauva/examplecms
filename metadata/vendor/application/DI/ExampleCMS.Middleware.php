<?php

$di[ExampleCMS\Application\Middleware\Web\Session::class] = array(
    'sessionFactory' => ExampleCMS\Factory\Session::class,
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Application\Middleware\Router::class] = array(
    'routerFactory' => ExampleCMS\Factory\Router::class,
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Application\Middleware\Web\FrontController::class] = array(
    'metadata' => ExampleCMS\Metadata::class,
    'moduleFactory' => ExampleCMS\Factory\Module::class,
    'themeFactory' => ExampleCMS\Factory\Theme::class,
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Application\Middleware\CLI\FrontController::class] = array(
    'metadata' => ExampleCMS\Metadata::class,
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Application\Middleware\Web\OopsHandler::class] = array(
    'moduleFactory' => ExampleCMS\Factory\Module::class,
    'themeFactory' => ExampleCMS\Factory\Theme::class,
    'config' => ExampleCMS\Config::class,
    'response' => '*' . Laminas\Diactoros\Response::class,
);
