<?php

foreach (array(
    'cache' => array(
        'component' => 'ExampleCMS\\Metadata\\Handler\\Cache',
    ),
    'core' => array(
        'route' => 'metadata/core/$1.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
        'disableCache' => true,
    ),
    'modules' => array(
        'route' => [
            'application' => 'vendor/application/Ext/Modules/modules.ext.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
        'section' => 'applications',
    ),
    'responders' => array(
        'route' => [
            'application' => 'vendor/application/Ext/Responders/responders.ext.php',
            'module' => 'vendor/modules/$1/Ext/Responders/responders.ext.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
        'section' => 'responders',
    ),
    'components' => array(
        'route' => [
            'application' => 'vendor/application/Ext/Components/components.ext.php',
            'module' => 'vendor/modules/$1/Ext/Components/components.ext.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
        'section' => 'components',
    ),
    'routes' => array(
        'route' => [
            'application' => 'vendor/application/Ext/Routes/routes.ext.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'themes' => array(
        'route' => [
            'application' => 'vendor/application/Ext/Themes/themes.ext.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'tables' => array(
        'route' => 'metadata/tables/$1.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'events' => array(
        'route' => 'metadata/events/$1.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Event',
    ),
    'forms' => array(
        'route' => [
            'application' => 'vendor/application/Ext/Forms/forms.ext.php',
            'module' => 'vendor/modules/$1/Ext/Forms/forms.ext.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'applications' => array(
        'route' => [
            'application' => 'vendor/application/Ext/Applications/applications.ext.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'sessions' => array(
        'route' => 'metadata/session.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
) as $name => $value) {
    $handlers[$name] = $value;
}
