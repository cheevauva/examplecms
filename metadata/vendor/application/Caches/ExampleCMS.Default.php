<?php

$caches['memory'] = [
    'adapter' => 'ExampleCMS\Cache\Adapter\Memory',
];

$caches['file'] = [
    'adapter' => 'ExampleCMS\Cache\Adapter\File',
    'basePath' => 'cache/cache/',
];

$caches['fileSession'] = [
    'adapter' => 'ExampleCMS\Cache\Adapter\File',
    'basePath' => 'cache/sessions/',
];

$caches['memcached'] = [
    'adapter' => 'ExampleCMS\Cache\Adapter\Memcached',
    'servers' => array(
        array(
            'host' => 'localhost',
            'port' => 11211,
        ),
    ),
];

$caches['memcachedSession'] = [
    'adapter' => 'ExampleCMS\Cache\Adapter\Memcached',
    'servers' => array(
        array(
            'host' => 'localhost',
            'port' => 11211,
        ),
    ),
];

$caches['database'] = [
    'adapter' => 'ExampleCMS\Cache\Adapter\Database',
];
