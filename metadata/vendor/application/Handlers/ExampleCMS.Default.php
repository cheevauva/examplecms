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
            'application' => 'cache/metadata/application/Modules.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
        'section' => 'applications',
    ),
    'responders' => array(
        'route' => [
            'application' => 'cache/metadata/application/Responders.php',
            'module' => 'cache/metadata/modules/$1/Responders.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
        'section' => 'responders',
    ),
    'components' => array(
        'route' => [
            'application' => 'cache/metadata/application/Components.php',
            'module' => 'cache/metadata/modules/$1/Components.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
        'section' => 'components',
    ),
    'routes' => array(
        'route' => [
            'application' => 'cache/metadata/application/Routes.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'themes' => array(
        'route' => [
            'application' => 'cache/metadata/application/Themes.php',
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
            'application' => 'cache/metadata/application/Forms.php',
            'module' => 'cache/metadata/modules/$1/Forms.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'applications' => array(
        'route' => [
            'application' => 'cache/metadata/application/Applications.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'sessions' => array(
        'route' => 'metadata/session.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'languages' => array(
        'route' => [
            'application' => 'cache/metadata/application/Language/$2.php',
            'module' => 'cache/metadata/modules/$1/Language/$2.php',
        ],
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    )
) as $name => $value) {
    $handlers[$name] = $value;
}
