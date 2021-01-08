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
    'ExampleCMS\Form\Form' => array(
        'config' => 'ExampleCMS\Config',
        'app' => 'ExampleCMS\Container',
    ),
    'ExampleCMS\Layer\Model' => array(
        'eventManager' => 'ExampleCMS\EventManager',
    ),
    'ExampleCMS\Module\Grid\Action\DesignerUpdate' => array(
        'config' => 'ExampleCMS\Config',
    ),
    'ExampleCMS\Module\Role\Model' => array(
        'config' => 'ExampleCMS\Config',
    ),
    'ExampleCMS\Action\Cli\Install' => array(
        'config' => 'ExampleCMS\Config',
    ),
    'ExampleCMS\Action\Cli' => array(
        'config' => 'ExampleCMS\Config',
    ),
    // queries
    'ExampleCMS\Query\Query' => array(
        'config' => 'ExampleCMS\Config',
        'metadata' => 'ExampleCMS\Metadata',
    ),
    // structure
    'ExampleCMS\Logger' => array(
        'config' => 'ExampleCMS\Config',
        'filesystem' => 'ExampleCMS\Filesystem',
    ),
    ExampleCMS\Module::class => array(
        'metadata' => ExampleCMS\Metadata::class,
        'componentFactory' => ExampleCMS\Factory\Component::class,
    ),
    // views
    'ExampleCMS\Responder' => array(
        'gridFactory' => 'ExampleCMS\Factory\View\Grid',
        'metadata' => 'ExampleCMS\Metadata',
        'config' => 'ExampleCMS\Config',
    ),
    'ExampleCMS\Application\View\Basic' => array(
        'config' => 'ExampleCMS\Config',
        'router' => 'ExampleCMS\Router',
    ),
    'ExampleCMS\Application\Layout\Basic' => array(
        'config' => 'ExampleCMS\Config',
    ),
    'ExampleCMS\Application\Responder' => array(
        'router' => 'ExampleCMS\Router',
        'config' => 'ExampleCMS\Config',
    ),
    'ExampleCMS\Application\Column\Basic' => array(
        'config' => 'ExampleCMS\Config',
    ),
) as $name => $value) {
    $di[$name] = $value;
}