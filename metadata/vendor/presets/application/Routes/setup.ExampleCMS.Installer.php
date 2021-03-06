<?php

// begin code from preset @presetvar0

$routes['main'] = array(
    'method' => 'GET',
    'route' => '/',
    'target' => array(
        'module' => 'Installer',
        'actions' => [
            [
                'component' => 'redirect',
                'route' => 'license',
                'params' => [],
            ]
        ],
    ),
);

$routes['license'] = array(
    'method' => 'GET',
    'route' => '/license/',
    'target' => array(
        'module' => 'Installer',
        'responder' => [
            'type' => 'layout',
            'component' => 'setup',
            'views' => [
                'body' => 'license',
            ],
        ],
        'actions' => [
            [
                'component' => 'read',
                'form' => 'license',
                'entity' => 'license',
            ],
        ],
    ),
);

$routes['license_save'] = array(
    'method' => 'POST',
    'route' => '/license/',
    'target' => [
        'module' => 'Installer',
        'actions' => [
            [
                'component' => 'save',
                'form' => 'license',
            ],
            [
                'component' => 'redirect',
                'route' => 'language',
                'params' => [],
            ]
        ],
    ],
);


$routes['language'] = [
    'method' => 'GET',
    'route' => '/language/',
    'target' => [
        'module' => 'Installer',
        'responder' => [
            'type' => 'layout',
            'component' => 'setup',
            'views' => [
                'body' => 'language',
            ],
        ],
        'actions' => [
            [
                'component' => 'read',
                'form' => 'language',
                'entity' => 'language',
            ],
        ],
    ],
];

$routes['language_save'] = array(
    'method' => 'POST',
    'route' => '/language/',
    'target' => array(
        'actions' => [
            [
                'component' => 'save',
                'form' => 'language',
            ],
            [
                'component' => 'redirect',
                'route' => 'database',
                'params' => [],
            ]
        ],
        'module' => 'Installer',
        'context-to-session' => [
            'language' => 'language',
        ],
    ),
);

$routes['database'] = array(
    'method' => 'GET',
    'route' => '/database/',
    'target' => array(
        'module' => 'Installer',
        'responder' => [
            'type' => 'layout',
            'component' => 'setup',
            'views' => [
                'body' => 'database',
            ],
        ],
        'actions' => [
            [
                'component' => 'read',
                'form' => 'database',
                'entity' => 'database',
            ],
        ],
    ),
);
$routes['database_save'] = array(
    'method' => 'POST',
    'route' => '/database/',
    'target' => [
        'module' => 'Installer',
        'responder' => [
            'type' => 'layout',
            'component' => 'setup',
            'views' => [
                'body' => 'database',
            ],
        ],
        'actions' => [
            [
                'component' => 'save',
                'form' => 'database',
            ],
            [
                'component' => 'redirect-when-valid-entity',
                'route' => 'language',
                'entity' => 'database',
            ]
        ],
    ],
);
$routes['database_list'] = array(
    'method' => 'GET',
    'route' => '/database/list/',
    'target' => array(
        'actions' => [
            [
                'collection' => 'databases',
                'component' => 'index',
            ],
        ],
        'module' => 'Installer',
        'responder' => [
            'type' => 'layout',
            'component' => 'setup',
            'views' => [
                'body' => 'database_index',
            ],
        ],
    ),
);
// end code from preset @presetvar0