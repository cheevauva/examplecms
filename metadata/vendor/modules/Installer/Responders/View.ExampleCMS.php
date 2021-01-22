<?php

$view['database'] = array(
    'component' => 'form',
    'model' => 'database',
    'method' => 'POST',
    'route' => 'database_save',
    'grids' => [
        'database',
    ],
);

$view['language'] = array(
    'component' => 'form',
    'model' => 'language',
    'method' => 'POST',
    'route' => 'language_save',
    'grids' => [
        'language',
    ],
);

$view['license'] = array(
    'component' => 'form',
    'model' => 'license',
    'method' => 'POST',
    'route' => 'license_save',
    'grids' => [
        'license',
    ],
);
$view['database_index'] = array(
    'component' => 'list',
    'collection' => 'databases',

);
