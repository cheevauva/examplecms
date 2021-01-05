<?php

// begin code from preset @presetvar0

$routes['main'] = array(
    'method' => 'GET',
    'route' => '/',
    'target' => array(
        'module' => 'Installer',
        'redirect' => [
            'route' => 'license',
            'params' => [],
        ]
    ),
);

$routes['license'] = array(
    'method' => 'GET',
    'route' => '/license',
    'target' => array(
        'module' => 'Installer',
        'layout' => 'setup',
        'actions' => [
            'license',
        ],
        'forms' => [
            'license'
        ],
        'form' => 'license',
        'views' => array(
            'body' => array(
                'component' => 'forms',
                'grids' => [
                    'license',
                ],
            ),
        ),
    ),
);

$routes['license_save'] = array(
    'method' => 'POST',
    'route' => '/license',
    'target' => array(
        'forms' => [
            'license'
        ],
        'actions' => ['save'],
        'form' => 'license',
        'module' => 'Installer',
        'redirect' => [
            'route' => 'language',
            'params' => [],
        ],
    ),
);


$routes['language'] = array(
    'method' => 'GET',
    'route' => '/language',
    'target' => array(
        'module' => 'Installer',
        'layout' => 'setup',
        'actions' => [
            'read',
        ],
        'forms' => [
            'language'
        ],
        'form' => 'language',
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
            'language'
        ],
        'redirect' => [
            'route' => 'database',
            'params' => [],
        ],
        'actions' => ['save'],
        'form' => 'language',
        'module' => 'Installer',
    ),
);

$routes['database'] = array(
    'method' => 'GET',
    'route' => '/database',
    'target' => array(
        'actions' => [
            'read',
        ],
        'module' => 'Installer',
        'layout' => 'setup',
        'forms' => [
            'database'
        ],
        'form' => 'database',
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
            'database'
        ],
        'module' => 'Installer',
        'actions' => ['save'],
        'redirect' => [
            'route' => 'language',
            'params' => [],
        ],
    ),
);

// end code from preset @presetvar0