<?php

$di[ExampleCMS\Application::class] = array(
    'metadata' => ExampleCMS\Metadata::class,
    'middlewareFactory' => \ExampleCMS\Factory\Middleware::class,
    'response' => '*' . Laminas\Diactoros\Response::class,
);
$di[ExampleCMS\Session\File::class] = array(
    'cacheFactory' => ExampleCMS\Factory\Cache::class,
);
$di[ExampleCMS\Session\Memcached::class] = array(
    'cacheFactory' => ExampleCMS\Factory\Cache::class,
);

$di[ExampleCMS\Router::class] = array(
    'altoRouter' => '*' . AltoRouter::class,
    'metadata' => ExampleCMS\Metadata::class,
);
$di[ExampleCMS\Module::class] = array(
    'metadata' => ExampleCMS\Metadata::class,
    'componentFactory' => ExampleCMS\Factory\Component::class,
);
$di[ExampleCMS\Application\Theme\Theme::class] = [
    'filesystem' => \ExampleCMS\Filesystem::class,
];
