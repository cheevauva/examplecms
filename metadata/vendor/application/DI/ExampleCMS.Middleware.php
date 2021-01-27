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
$di[ExampleCMS\Application\Middleware\Web\OopsHandler::class] = array(
    'moduleFactory' => '?moduleFactory',
    'rendererFactory' => '?rendererFactory',
    'responderFactory' => '?responderFactory',
    'config' => '?config',
    'response' => '?httpResponse',
);
$di[ExampleCMS\Application\Middleware\PresetLanguageBySession::class] = array(
    'config' => '?config',
);
$di[ExampleCMS\Application\Middleware\PresetRendererBySession::class] = array(
    'rendererFactory' => '?rendererFactory',
    'config' => '?config',
);
$di[ExampleCMS\Application\Middleware\PresetModule::class] = array(
    'moduleFactory' => '?moduleFactory',
    'metadata' => '?metadata',
);
$di[ExampleCMS\Application\Middleware\PresetResponder::class] = array(
    'responderFactory' => '?responderFactory',
);
