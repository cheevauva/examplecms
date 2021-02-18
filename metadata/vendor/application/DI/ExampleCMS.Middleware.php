<?php

$di[ExampleCMS\Application\Middleware\Session::class] = array(
    'sessionFactory' => '?sessionFactory',
    'config' => '?config',
);
$di[ExampleCMS\Application\Middleware\Router::class] = array(
    'routerFactory' => '?routerFactory',
    'config' => '?config',
);
$di[ExampleCMS\Application\Middleware\CLI\FrontController::class] = array(
    'config' => '?config',
);
$di[ExampleCMS\Application\Middleware\Web\FrontController::class] = array(
    'actionFactory' => '?actionFactory',
    'moduleFactory' => '?moduleFactory',
    'responderFactory' => '?responderFactory',
    'rendererFactory' => '?rendererFactory',
    'config' => '?config',
);
$di[ExampleCMS\Application\Middleware\Web\OopsHandler::class] = array(
    'moduleFactory' => '?moduleFactory',
    'rendererFactory' => '?rendererFactory',
    'responderFactory' => '?responderFactory',
    'config' => '?config',
    'response' => '?httpResponse',
);