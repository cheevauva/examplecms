<?php

$views['database'] = array(
    'component' => 'form',
    'model' => 'database',
    'method' => 'POST',
    'route' => 'database_save',
    'grids' => [
        'database',
    ],
);

$views['language'] = array(
    'component' => 'form',
    'model' => 'language',
    'method' => 'POST',
    'route' => 'language_save',
    'grids' => [
        'language',
    ],
);

$views['license'] = array(
    'component' => 'form',
    'model' => 'license',
    'method' => 'POST',
    'route' => 'license_save',
    'grids' => [
        'license',
    ],
);