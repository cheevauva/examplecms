<?php

$routes['language'] = array(
    'method' => 'GET',
    'route' => '/language',
    'target' => array(
        'module' => 'Installer',
        'layout' => 'setup',
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
        'redirect_to' => 'database',
        'action' => 'save',
        'form' => 'language',
        'module' => 'Installer',
    ),
);

$routes['database'] = array(
    'method' => 'GET',
    'route' => '/database',
    'target' => array(
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
        'id' => 'setup',
        'operation' => 'edit',
        'action' => 'save',
        'view' => 'json',
        'form' => 'edit',
        'layout' => 'setup',
    ),
);
