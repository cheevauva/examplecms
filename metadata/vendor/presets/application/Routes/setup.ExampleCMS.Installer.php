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
            [
                'component' => 'read',
                'form' => 'license',
            ],
        ],
        'views' => array(
            'body' => 'license',
        ),
    ),
);

$routes['license_save'] = array(
    'method' => 'POST',
    'route' => '/license',
    'target' => array(
        'actions' => [
            [
                'component' => 'save',
                'form' => 'license',
            ],
        ],
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
            [
                'component' => 'read',
                'form' => 'language',
            ],
        ],
        'views' => array(
            'body' => 'language',
        ),
    ),
);

$routes['language_save'] = array(
    'method' => 'POST',
    'route' => '/language',
    'target' => array(
        'redirect' => [
            'route' => 'database',
            'params' => [],
        ],
        'actions' => [
            [
                'component' => 'save',
                'form' => 'language',
            ],
        ],
        'module' => 'Installer',
    ),
);

$routes['database'] = array(
    'method' => 'GET',
    'route' => '/database',
    'target' => array(
        'actions' => [
            [
                'component' => 'read',
                'form' => 'database',
            ],
        ],
        'module' => 'Installer',
        'layout' => 'setup',
        'views' => array(
            'body' => 'database',
        ),
    ),
);
$routes['database_save'] = array(
    'method' => 'POST',
    'route' => '/database',
    'target' => array(
        'module' => 'Installer',
        'actions' => [
            [
                'component' => 'save',
                'form' => 'database',
            ],
        ],
        'redirect' => [
            'route' => 'language',
            'params' => [],
        ],
    ),
);

// end code from preset @presetvar0