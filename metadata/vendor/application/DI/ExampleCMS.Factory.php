<?php

$di[ExampleCMS\Factory\Factory::class] = array(
    'metadata' => '?metadata',
    'builder' => '?builder',
);
$di[ExampleCMS\Factory\MetadataHandler::class] = array(
    '^1' => '@handlersMetadata',
);
$di[ExampleCMS\Factory\Router::class] = array(
    'config' => '?config',
);
$di[ExampleCMS\Factory\Cache::class] = array(
    'config' => '?config',
    '^1' => '@cachesMetadata',
);

$di[ExampleCMS\Factory\Config::class] = array(
    'builder' => '?builder',
    '^1' => '@configsMetadata',
);
