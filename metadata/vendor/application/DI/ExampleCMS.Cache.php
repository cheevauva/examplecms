<?php

$di[ExampleCMS\Cache\Adapter\Adapter::class] = array(
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Cache\Cache::class] = array(
    'cacheFactory' => ExampleCMS\Factory\Cache::class,
    'config' => ExampleCMS\Config::class,
);
$di[ExampleCMS\Cache\Adapter\File::class] = array(
    'config' => ExampleCMS\Config::class,
    'filesystem' => ExampleCMS\Filesystem::class,
);
