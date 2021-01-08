<?php

foreach (array(
    'ExampleCMS\Application\Middleware\MiddlewareBus' => array(
        'container' => 'ExampleCMS\Container',
    ),
    'ExampleCMS\Application\Middleware\Web\Session' => array(
        'sessionFactory' => 'ExampleCMS\Factory\Session',
        'config' => 'ExampleCMS\Config',
    ),

    'ExampleCMS\Application\Middleware\BasePath' => array(
        'config' => 'ExampleCMS\\Config',
    ),

    'ExampleCMS\Application\Middleware\Router' => array(
        'routerFactory' => 'ExampleCMS\Factory\Router',
        'config' => 'ExampleCMS\Config',
    ),
    'ExampleCMS\Application\Middleware\Web\FrontController' => array(
        'metadata' => 'ExampleCMS\\Metadata',
        'moduleFactory' => 'ExampleCMS\Factory\Module',
        'themeFactory' => 'ExampleCMS\Factory\Theme',
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\Application\Middleware\CLI\FrontController' => array(
        'metadata' => 'ExampleCMS\\Metadata',
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\Application\Middleware\Web\OopsHandler' => array(
        'moduleFactory' => 'ExampleCMS\Factory\Module',
        'themeFactory' => 'ExampleCMS\Factory\Theme',
        'config' => 'ExampleCMS\Config',
    ),
    'ExampleCMS\Application' => array(
        'metadata' => 'ExampleCMS\\Metadata',
        'container' => 'ExampleCMS\\Container',
    ),
    'ExampleCMS\Session\File' => array(
        'filesystem' => 'ExampleCMS\Filesystem',
        'cacheFactory' => 'ExampleCMS\Factory\Cache',
    ),
    'ExampleCMS\Session\Memcached' => array(
        'cacheFactory' => 'ExampleCMS\Factory\Cache',
    ),
    'ExampleCMS\\Config' => array(
        'filesystem' => 'ExampleCMS\Filesystem',
    ),
    'ExampleCMS\Router' => array(
        'config' => 'ExampleCMS\Config',
        'altoRouter' => '*AltoRouter',
        'metadata' => 'ExampleCMS\Metadata',
    ),
    'ExampleCMS\\Form\Form' => array(
        'config' => 'ExampleCMS\\Config',
        'app' => 'ExampleCMS\\Container',
    ),
    'ExampleCMS\\Layer\\Model' => array(
        'eventManager' => 'ExampleCMS\\EventManager',
    ),
    'ExampleCMS\\Module\\Grid\\Action\\DesignerUpdate' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Module\Role\Model' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\Module' => array(
        'metadata' => 'ExampleCMS\Metadata',
    ),
    'ExampleCMS\\Action\Cli\Install' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Action\Cli' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    // queries
    'ExampleCMS\\Query\\Query' => array(
        'config' => 'ExampleCMS\\Config',
        'metadata' => 'ExampleCMS\\Metadata',
    ),
    // structure
    'ExampleCMS\\Config' => array(
        'arrayUtil' => 'ExampleCMS\\Util\\Arr',
    ),
    'ExampleCMS\\Logger' => array(
        'config' => 'ExampleCMS\\Config',
        'filesystem' => 'ExampleCMS\\Filesystem',
    ),
    'ExampleCMS\\Module' => array(
        'metadata' => 'ExampleCMS\\Metadata',
        'container' => 'ExampleCMS\\Container',
    ),
    'ExampleCMS\\Metadata' => array(
        'metadataHandlerFactory' => 'ExampleCMS\\Factory\\MetadataHandler',
    ),
    'ExampleCMS\\EventManager' => array(
        'container' => 'ExampleCMS\\Container',
        'config' => 'ExampleCMS\\Config',
        'metadata' => 'ExampleCMS\\Metadata',
    ),
    // views
    'ExampleCMS\\Responder' => array(
        'gridFactory' => 'ExampleCMS\\Factory\\View\\Grid',
        'metadata' => 'ExampleCMS\\Metadata',
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Application\\View\\Basic' => array(
        'config' => 'ExampleCMS\\Config',
        'router' => 'ExampleCMS\\Router',
    ),
    'ExampleCMS\\Application\\Layout\\Basic' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\Application\Responder' => array(
        'router' => 'ExampleCMS\\Router',
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Application\\Column\\Basic' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\Metadata\Handler\ApplicationModule' => array(
        'metadataHandlerFactory' => 'ExampleCMS\\Factory\\MetadataHandler',
    ),
) as $name => $value) {
    $di[$name] = $value;
}