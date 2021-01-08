<?php

$di[ExampleCMS\Factory\Factory::class] = array(
    'metadata' => ExampleCMS\Metadata::class,
    'container' => ExampleCMS\Container::class,
);
$di[ExampleCMS\Factory\MetadataHandler::class] = array(
    'filesystem' => ExampleCMS\Filesystem::class,
);
$di[ExampleCMS\Factory\Router::class] = array(
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Factory\Session::class] = array(
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Factory\Cache::class] = array(
    'config' => ExampleCMS\Config::class,
    'filesystem' => ExampleCMS\Filesystem::class,
);
