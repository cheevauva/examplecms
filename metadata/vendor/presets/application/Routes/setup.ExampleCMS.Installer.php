<?php

$routes['main'] = array(
    'method' => 'GET',
    'route' => '/',
    'target' => array(
        'module' => 'Installer',
        'redirect' => [
            'route' => 'language',
            'params' => [],
        ]
    ),
);

$routes['language'] = array(
    'method' => 'GET',
    'route' => '/language',
    'target' => array(
        'module' => 'Installer',
        'layout' => 'setup',
        'action' => 'read',
        'forms' => [
            'language',
        ],
        'views' => array(
            'body' => array(
                'component' => 'forms',
                'grids' => [
                    'language',
                ],
            ),
        ),
    ),
);

$routes['language_save'] = array(
    'method' => 'POST',
    'route' => '/language',
    'target' => array(
        'forms' => [
            'language',
        ],
        'redirect' => [
            'route' => 'database',
            'params' => [],
        ],
        'action' => 'save',
        'form' => 'language',
        'module' => 'Installer',
    ),
);

$routes['database'] = array(
    'method' => 'GET',
    'route' => '/database',
    'target' => array(
        'action' => 'read',
        'module' => 'Installer',
        'layout' => 'setup',
        'forms' => [
            'database',
        ],
        'views' => array(
            'body' => array(
                'component' => 'form',
                'grids' => [
                    'database',
                ],
            ),
        ),
    ),
);
$routes['database_save'] = array(
    'method' => 'POST',
    'route' => '/database',
    'target' => array(
        'forms' => [
            'database',
        ],
        'module' => 'Installer',
        'action' => 'save',
        'redirect' => [
            'route' => 'language',
            'params' => [],
        ],
    ),
);
