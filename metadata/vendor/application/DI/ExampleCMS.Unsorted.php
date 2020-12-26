<?php

foreach (array(
    'ExampleCMS\Application\Middleware\MiddlewareBus' => array(
        'container' => 'ExampleCMS\Container',
    ),
    'ExampleCMS\Application\Middleware\Web\Session' => array(
        'sessionFactory' => 'ExampleCMS\Factory\Session',
        'config' => 'ExampleCMS\Config',
    ),
    'ExampleCMS\\Factory\\Session' => array(
        'container' => 'ExampleCMS\\Container',
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\Application\Middleware\BasePath' => array(
        'config' => 'ExampleCMS\\Config',
        'bootstrap' => 'ExampleCMS\\Bootstrap',
    ),
    'ExampleCMS\Application\Middleware\Router' => array(
        'router' => 'ExampleCMS\\Router',
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\Application\Middleware\Web\FrontController' => array(
        'metadata' => 'ExampleCMS\\Metadata',
        'router' => 'ExampleCMS\\Router',
        'moduleFactory' => 'ExampleCMS\\Factory\\Module',
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\Application\Middleware\CLI\FrontController' => array(
        'metadata' => 'ExampleCMS\\Metadata',
        'bootstrap' => 'ExampleCMS\\Bootstrap',
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\Application\Middleware\Web\OopsHandler' => array(
        'moduleFactory' => 'ExampleCMS\Factory\Module',
        'config' => 'ExampleCMS\Config',
    ),
    'ExampleCMS\\Application' => array(
        'bootstrap' => 'ExampleCMS\\Bootstrap',
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
    'ExampleCMS\\Router' => array(
        'config' => 'ExampleCMS\\Config',
        'altoRouter' => 'AltoRouter',
        'metadata' => 'ExampleCMS\\Metadata',
        'bootstrap' => 'ExampleCMS\\Bootstrap',
    ),
    'ExampleCMS\\Form\Form' => array(
        'config' => 'ExampleCMS\\Config',
        'app' => 'ExampleCMS\\Container',
    ),
    'ExampleCMS\Application\Action' => array(
        'formManager' => 'ExampleCMS\FormManager',
    ),
    // layers
    'ExampleCMS\\Layer\View\Model' => array(
        'router' => 'ExampleCMS\\Router',
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
    'ExampleCMS\\Module' => array(
        //'themeFactory' => 'ExampleCMS\\Factory\\Theme',
        'metadata' => 'ExampleCMS\\Metadata',
    ),
    // factories
    'ExampleCMS\\Application\\View\\Form' => array(
        'formManager' => 'ExampleCMS\\FormManager',
        'router' => 'ExampleCMS\Router',
    ),
    'ExampleCMS\\Factory\\Form\\Binder' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Helper\Helper' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Action\Cli\Install' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Action\Cli' => array(
        'router' => 'ExampleCMS\\Router',
        'config' => 'ExampleCMS\\Config',
    ),
    // queries
    'ExampleCMS\\Query\\Query' => array(
        'config' => 'ExampleCMS\\Config',
        'metadata' => 'ExampleCMS\\Metadata',
    ),
    'ExampleCMS\\Query\\Database\\Query' => array(
        'tableFactory' => 'ExampleCMS\\Factory\\Database\\Table',
        'metadata' => 'ExampleCMS\\Metadata',
        'logger' => 'ExampleCMS\\Logger',
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
    'ExampleCMS\\Model\\Form' => array(
        'formManager' => 'ExampleCMS\\FormManager',
        'router' => 'ExampleCMS\\Router',
    ),
    'ExampleCMS\\FormManager' => array(
        'moduleFactory' => 'ExampleCMS\\Factory\\Module',
        'metadata' => 'ExampleCMS\\Metadata',
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
    'ExampleCMS\\Application\\Theme\\Basic' => array(
        'config' => 'ExampleCMS\\Config',
        'metadata' => 'ExampleCMS\\Metadata',
        'bootstrap' => 'ExampleCMS\\Bootstrap',
    ),
    'ExampleCMS\\Application\\View\\Exception' => array(
        'application' => 'ExampleCMS\\Application',
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
$di['ExampleCMS\Application\Action\Action'] = array(
    'formManager' => 'ExampleCMS\FormManager',
);
