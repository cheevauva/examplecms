<?php

$di[ExampleCMS\Application\Middleware\Session::class] = array(
    'sessionFactory' => ExampleCMS\Factory\Session::class,
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Application\Middleware\Router::class] = array(
    'routerFactory' => ExampleCMS\Factory\Router::class,
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Application\Middleware\CLI\FrontController::class] = array(
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Application\Middleware\Web\OopsHandler::class] = array(
    'moduleFactory' => ExampleCMS\Factory\Module::class,
    'themeFactory' => ExampleCMS\Factory\Theme::class,
    'config' => ExampleCMS\Config::class,
    'response' => '*' . Laminas\Diactoros\Response::class,
);
$di[ExampleCMS\Application\Middleware\PresetLanguageBySession::class] = array(
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Application\Middleware\PresetThemeBySession::class] = array(
    'themeFactory' => ExampleCMS\Factory\Theme::class,
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Application\Middleware\PresetModule::class] = array(
    'moduleFactory' => ExampleCMS\Factory\Module::class,
    'metadata' => ExampleCMS\Metadata::class,
);
$di[ExampleCMS\Application\Middleware\PresetResponder::class] = array(
    'responderFactory' => ExampleCMS\Factory\Responder::class,
);
