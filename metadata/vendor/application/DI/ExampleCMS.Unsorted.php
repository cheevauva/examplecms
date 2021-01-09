<?php

foreach (array(
    'ExampleCMS\Application' => array(
        'metadata' => ExampleCMS\Metadata::class,
        'middlewareFactory' => \ExampleCMS\Factory\Middleware::class,
        'response' => '*' . Laminas\Diactoros\Response::class,
    ),
    'ExampleCMS\Session\File' => array(
        'filesystem' => 'ExampleCMS\Filesystem',
        'cacheFactory' => 'ExampleCMS\Factory\Cache',
    ),
    'ExampleCMS\Session\Memcached' => array(
        'cacheFactory' => 'ExampleCMS\Factory\Cache',
    ),
    'ExampleCMS\Config' => array(
        'filesystem' => 'ExampleCMS\Filesystem',
    ),
    'ExampleCMS\Router' => array(
        'config' => 'ExampleCMS\Config',
        'altoRouter' => '*AltoRouter',
        'metadata' => 'ExampleCMS\Metadata',
    ),
    ExampleCMS\Module::class => array(
        'metadata' => ExampleCMS\Metadata::class,
        'componentFactory' => ExampleCMS\Factory\Component::class,
    ),
) as $name => $value) {
    $di[$name] = $value;
}