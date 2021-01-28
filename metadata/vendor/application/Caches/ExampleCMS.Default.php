<?php

$caches['memory'] = [
    'adapter' => ExampleCMS\Cache\Adapter\Memory::class,
];

$caches['file'] = [
    'adapter' => ExampleCMS\Cache\Adapter\File::class,
    'basePath' => 'cache/cache/',
];

$caches['sessionFile'] = [
    'adapter' => ExampleCMS\Cache\Adapter\File::class,
    'basePath' => 'cache/sessions/',
];

$caches['memcached'] = [
    'adapter' => ExampleCMS\Cache\Adapter\Memcached::class,
    'servers' => array(
        array(
            'host' => 'localhost',
            'port' => 11211,
        ),
    ),
];

$caches['sessionMemcached'] = [
    'adapter' => ExampleCMS\Cache\Adapter\Memcached::class,
    'servers' => array(
        array(
            'host' => 'localhost',
            'port' => 11211,
        ),
    ),
];

$caches['database'] = [
    'adapter' => ExampleCMS\Cache\Adapter\Database::class,
];
