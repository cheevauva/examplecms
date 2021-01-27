<?php

$di[ExampleCMS\Cache\Adapter\Adapter::class] = array(
    'config' => '?config',
);
$di[ExampleCMS\Cache\Cache::class] = array(
    'cacheFactory' => '?cacheFactory',
    'config' => '?config',
);
$di[ExampleCMS\Cache\Adapter\File::class] = array(
    'config' => '?config',
    'filesystem' => '?filesystem',
);
