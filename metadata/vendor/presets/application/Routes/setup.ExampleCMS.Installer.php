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
        'responder' => [
            'type' => 'layout',
            'component' => 'setup',
            'context' => [
                'views' => [
                    'body' => 'license',
                ],
            ]
        ],
        'actions' => [
            [
                'component' => 'read',
                'form' => 'license',
            ],
        ],
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


$routes['language'] = [
    'method' => 'GET',
    'route' => '/language',
    'target' => [
        'module' => 'Installer',
        'responder' => [
            'type' => 'layout',
            'component' => 'setup',
            'context' => [
                'views' => [
                    'body' => 'language',
                ],
            ]
        ],
        'actions' => [
            [
                'component' => 'read',
                'form' => 'language',
            ],
        ],
    ],
];

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
        'responder' => [
            'type' => 'layout',
            'component' => 'setup',
            'context' => [
                'views' => [
                    'body' => 'database',
                ],
            ]
        ],
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
$routes['database_list'] = array(
    'method' => 'GET',
    'route' => '/database/list',
    'target' => array(
        'actions' => [
            [
                'component' => 'index',
            ],
        ],
        'module' => 'Installer',
        'responder' => [
            'type' => 'layout',
            'component' => 'setup',
            'context' => [
                'views' => [
                    'body' => 'database_index',
                ],
            ]
        ],
    ),
);
// end code from preset @presetvar0