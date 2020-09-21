<?php

return array(
    'cache' => array(
        'component' => 'ExampleCMS\\Metadata\\Handler\\Cache',
    ),
    'core' => array(
        'route' => 'metadata/core/$1.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
        'disableCache' => true,
    ),
    'modules' => array(
        'route' => 'metadata/modules.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'responder' => array(
        'route' => 'metadata/responder/$1.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'components' => array(
        'route' => 'metadata/components/$1.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'routes' => array(
        'route' => 'metadata/routes/$1.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'themes' => array(
        'route' => 'metadata/themes/$1.php',
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
        'route' => 'metadata/forms/$1.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'applications' => array(
        'route' => 'metadata/applications.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
    'sessions' => array(
        'route' => 'metadata/session.php',
        'component' => 'ExampleCMS\\Metadata\\Handler\\Basic',
    ),
);
