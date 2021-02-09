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
$di[ExampleCMS\Application\Query\Query::class] = array(
    'entityFactory' => '?entityFactory',
);
$di[ExampleCMS\Application\Action\Action::class] = array(
    'queryFactory' => '?queryFactory',
);
$di[ExampleCMS\Application\Entity\Entity::class] = array(
    'mapperFactory' => '?mapperFactory',
);
$di[ExampleCMS\Module::class] = [
    'metadata' => '?metadata',
];