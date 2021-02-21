<?php

$view['database'] = array(
    'component' => 'form',
    'entity' => 'database',
    'method' => 'POST',
    'route' => 'database_save',
    'grids' => [
        'database',
    ],
);

$view['language'] = array(
    'component' => 'form',
    'entity' => 'language',
    'method' => 'POST',
    'route' => 'language_save',
    'grids' => [
        'language',
    ],
);

$view['license'] = array(
    'component' => 'form',
    'entity' => 'license',
    'method' => 'POST',
    'route' => 'license_save',
    'grids' => [
        'license',
    ],
);
$view['database_index'] = [
    'component' => 'list',
    'collection' => 'databases',
    'rows' => [
        [
            'component' => 'default',
            'template' => 'table-row',
            'columns' => [
                [
                    'component' => 'default',
                    'template' => 'table-column-data',
                    'fields' => [
                        [
                            'component' => 'enum',
                            'template' => 'view',
                            'name' => 'sql_engine',
                            'options' => 'sql_engines',
                        ]
                    ],
                ],
            ],
        ],
    ],
];
