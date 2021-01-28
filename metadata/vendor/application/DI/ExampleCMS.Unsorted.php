<?php

$di[ExampleCMS\Application::class] = array(
    'metadata' => '?metadata',
    'middlewareFactory' => '?middlewareFactory',
    'response' => '?httpResponse',
    'context' => '?context',
);
$di[ExampleCMS\Router::class] = array(
    'altoRouter' => '*' . AltoRouter::class,
    'metadata' => '?metadata',
);
$di[ExampleCMS\Module::class] = array(
    'metadata' => '?metadata',
    'componentFactory' => '?componentFactory',
    'responderFactory' => '?responderFactory',
);
$di[ExampleCMS\Responder::class] = array(
    'responderFactory' => '?responderFactory',
);
$di[ExampleCMS\Renderer::class] = [
    'filesystem' => '?filesystem',
    'metadata' => '?metadata',
];
$di[ExampleCMS\Config::class] = [
    'configFactory' => '?configFactory',
];
$di[ExampleCMS\Config\Local::class] = [
    'arrayHelper' => '?arrayHelper',
    'filesystem' => '?filesystem',
];
$di[ExampleCMS\Filesystem::class] = [
    '^1' => '@basePath',
];
$di[ExampleCMS\Bootstrap::class] = [
    'config' => '?config',
    'application' => '?application',
];
