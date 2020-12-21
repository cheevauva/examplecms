<?php

foreach (array(
    'ExampleCMS\\Cache' => array(
        'config' => 'ExampleCMS\\Config',
        'cacheFactory' => 'ExampleCMS\\Factory\\Cache',
    ),
    'ExampleCMS\\Middleware' => array(
        'container' => 'ExampleCMS\\Container',
    ),
    'ExampleCMS\\Middleware\\Session' => array(
        'sessionFactory' => 'ExampleCMS\\Factory\\Session',
    ),
    'ExampleCMS\\Factory\\Session' => array(
        'container' => 'ExampleCMS\\Container',
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Middleware\\BasePath' => array(
        'config' => 'ExampleCMS\\Config',
        'bootstrap' => 'ExampleCMS\\Bootstrap',
    ),
    'ExampleCMS\\Middleware\\Router' => array(
        'router' => 'ExampleCMS\\Router',
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Middleware\\Application' => array(
        'metadata' => 'ExampleCMS\\Metadata',
        'moduleFactory' => 'ExampleCMS\\Factory\\Module',
    ),
    'ExampleCMS\\Application' => array(
        'bootstrap' => 'ExampleCMS\\Bootstrap',
        'metadata' => 'ExampleCMS\\Metadata',
        'container' => 'ExampleCMS\\Container',
    ),
    'ExampleCMS\\Session\\File' => array(
        'filesystem' => 'ExampleCMS\\Filesystem',
    ),
    'ExampleCMS\\Config' => array(
        'filesystem' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Factory\\Cache' => array(
        'memory' => 'ExampleCMS\\Cache\\Memory',
        'memcached' => 'ExampleCMS\\Cache\\Memcached',
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
    'ExampleCMS\\Action\\Action' => array(
        'context' => 'ExampleCMS\\Context',
    ),
    // layers
    'ExampleCMS\\Layer\View\Model' => array(
        'context' => 'ExampleCMS\\Context',
        'router' => 'ExampleCMS\\Router',
    ),
    'ExampleCMS\\Layer\\Model' => array(
        'eventManager' => 'ExampleCMS\\EventManager',
    ),
    //  modules
    'ExampleCMS\\Module\User\EventHandler\Generic' => array(
        'common' => 'ExampleCMS\\Context',
    ),
    'ExampleCMS\\Module\\Grid\\Action\\DesignerUpdate' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Module\\Installer\\Action\\Update' => array(
        'formManager' => 'ExampleCMS\\FormManager',
    ),
    'ExampleCMS\\Module\Role\Model' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Module\User\Action\Login' => array(
        'common' => 'ExampleCMS\\Context',
    ),
    'ExampleCMS\\Module' => array(
        //'themeFactory' => 'ExampleCMS\\Factory\\Theme',
        'metadata' => 'ExampleCMS\\Metadata',
    ),
    'ExampleCMS\\Module\\Table\\Model\\Config' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Module\\Connection\\Storage' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    // factories
    'ExampleCMS\\Factory\\Database\\Connection' => array(
        'config' => 'ExampleCMS\\Config',
        'filesystem' => 'ExampleCMS\\Filesystem',
    ),
    'ExampleCMS\\Factory\Form' => array(
        'container' => 'ExampleCMS\\Container',
        'config' => 'ExampleCMS\\Config',
        'context' => 'ExampleCMS\\Context',
    ),
    'ExampleCMS\\Factory\\Database\\Table' => array(
        'config' => 'ExampleCMS\\Config',
        'connectionFactory' => 'ExampleCMS\\Factory\\Database\\Connection'
    ),
    'ExampleCMS\\Factory\\Database\\Table' => array(
        'config' => 'ExampleCMS\\Config',
        'connectionFactory' => 'ExampleCMS\\Factory\\Database\\Connection'
    ),
    'ExampleCMS\\Factory\\Exception' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Factory\\Factory' => array(
        'metadata' => 'ExampleCMS\\Metadata',
        'container' => 'ExampleCMS\\Container',
        'bundleFactory' => 'ExampleCMS\\Factory\\Bundle',
    ),
    'ExampleCMS\\Factory\\Metadata\\Handler' => array(
        'filesystem' => 'ExampleCMS\\Filesystem',
    ),
    'ExampleCMS\\Factory\\View\\Grid' => array(
        'config' => 'ExampleCMS\\Config',
        'container' => 'ExampleCMS\\Container',
    ),
    'ExampleCMS\\Application\\View\\Form' => array(
        'formManager' => 'ExampleCMS\\FormManager',
    ),
    'ExampleCMS\\Factory\\Form\\Binder' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Helper\Helper' => array(
        'config' => 'ExampleCMS\\Config',
        'context' => 'ExampleCMS\\Context',
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
        'bundleFactory' => 'ExampleCMS\\Factory\\Bundle',
        'metadata' => 'ExampleCMS\\Metadata',
    ),
    'ExampleCMS\\Bundle' => array(
        'container' => 'ExampleCMS\\Container',
        'metadata' => 'ExampleCMS\\Metadata',
        'tableFactory' => 'ExampleCMS\\Factory\\Database\\Table',
        'bundleFactory' => 'ExampleCMS\\Factory\\Bundle',
        'moduleFactory' => 'ExampleCMS\\Factory\\Module',
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
        'metadataHandlerFactory' => 'ExampleCMS\\Factory\\Metadata\\Handler',
    ),
    'ExampleCMS\\EventManager' => array(
        'container' => 'ExampleCMS\\Container',
        'config' => 'ExampleCMS\\Config',
        'metadata' => 'ExampleCMS\\Metadata',
    ),
    'ExampleCMS\\Context' => array(
        'bundleFactory' => 'ExampleCMS\\Factory\\Bundle',
        'themeFactory' => 'ExampleCMS\\Factory\\Theme',
    ),
    // views
    'ExampleCMS\\Responder' => array(
        'gridFactory' => 'ExampleCMS\\Factory\\View\\Grid',
        'metadata' => 'ExampleCMS\\Metadata',
        'context' => 'ExampleCMS\\Context',
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
        'context' => 'ExampleCMS\\Context',
        'config' => 'ExampleCMS\\Config',
        'router' => 'ExampleCMS\\Router',
    ),
    'ExampleCMS\\Application\\Layout\\Basic' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Responder\\Common' => array(
        'context' => 'ExampleCMS\\Context',
        'router' => 'ExampleCMS\\Router',
        'config' => 'ExampleCMS\\Config',
    ),
    'ExampleCMS\\Application\\Column\\Basic' => array(
        'config' => 'ExampleCMS\\Config',
    ),
    // datasources
    'ExampleCMS\\DataSource\\ContextModel' => array(
        'context' => 'ExampleCMS\\Context',
    ),
    // other
    'ExampleCMS\\Metadata\\Handler\\Cache' => array(
        'cache' => 'ExampleCMS\\Cache',
    ),
) as $name => $value) {
    $di[$name] = $value;
}
