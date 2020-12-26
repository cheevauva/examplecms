<?php

$di['ExampleCMS\Cache\Adapter\Adapter'] = array(
    'config' => 'ExampleCMS\Config',
);
$di['ExampleCMS\Factory\Cache'] = array(
    'config' => 'ExampleCMS\Config',
    'container' => 'ExampleCMS\Container',
    'filesystem' => 'ExampleCMS\Filesystem',
);
$di['ExampleCMS\Cache\Cache'] = array(
    'cacheFactory' => 'ExampleCMS\Factory\Cache',
    'config' => 'ExampleCMS\Config',
);
$di['ExampleCMS\Metadata\Handler\Cache'] = array(
    'cacheFactory' => 'ExampleCMS\Factory\Cache',
);
$di['ExampleCMS\Cache\Adapter\File'] = array(
    'config' => 'ExampleCMS\Config',
    'filesystem' => 'ExampleCMS\Filesystem',
);
