<?php

$di[ExampleCMS\Factory\Factory::class] = array(
    'metadata' => ExampleCMS\Metadata::class,
    'container' => ExampleCMS\Container::class,
);
$di[ExampleCMS\Factory\MetadataHandler::class] = array(
    '!handlersMetadata' => '@handlersMetadata',
);
$di[ExampleCMS\Factory\Router::class] = array(
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Factory\Session::class] = array(
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Factory\Cache::class] = array(
    'config' => ExampleCMS\Config::class,
    '!meta' => '@cachesMetadata',
);
