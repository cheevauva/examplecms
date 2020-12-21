<?php

$routes['language'] = array(
    'method' => 'GET',
    'route' => '/language',
    'target' => array(
        'module' => 'Installer',
        'layout' => 'setup',
        'views' => array(
            'body' => array(
                'type' => 'form',
                'form' => 'language',
                'grid' => 'language',
            ),
        ),
    ),
);

$routes['language_save'] = array(
    'method' => 'POST',
    'route' => '/language',
    'target' => array(
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
                'type' => 'form',
                'form' => 'database',
                'grid' => 'database',
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
