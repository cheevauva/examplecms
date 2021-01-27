<?php


$di[ExampleCMS\Session\File::class] = array(
    'cacheFactory' => '?cacheFactory',
);
$di[ExampleCMS\Session\Memcached::class] = array(
    'cacheFactory' => '?cacheFactory',
);
