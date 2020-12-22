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
                'component' => 'form',
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
        'views' => array(
            'body' => array(
                'component' => 'form',
                'forms' => [
                    'database',
                ],
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
        'module' => 'Installer',
        'id' => 'setup',
        'operation' => 'edit',
        'action' => 'save',
        'view' => 'json',
        'form' => 'edit',
        'layout' => 'setup',
    ),
);
