<?php

$view['database_mysql'] = array(
    'component' => 'form',
    'entity' => 'database',
    'method' => 'POST',
    'route' => 'database_save',
    'grids' => [
        'database_mysql',
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
    'component' => 'views',
    'views' => [
        'database_list_actions',
        'database_list',
    ],
];

$view['database_list_actions'] = [
    'component' => 'views',
    'views' => [
        [
            'component' => 'grid',
            'grid' => [
                'component' => 'form',
                'name' => 'z',
                'rows' => [
                    [
                        'component' => 'default',
                        'columns' => [
                            [
                                'component' => 'default',
                                'extra' => [
                                    'colspan' => 12,
                                ],
                                'fields' => [
                                    [
                                        'label' => 'add_mysql_connections',
                                        'extra' => [
                                            'as-button' => true,
                                        ],
                                        'component' => 'link',
                                        'route' => [
                                            'database_mysql',
                                            []
                                        ],
                                    ],
                                    [
                                        'label' => 'add_sqlite_connections',
                                        'extra' => [
                                            'as-button' => true,
                                        ],
                                        'component' => 'link',
                                        'route' => [
                                            'database_sqlite',
                                            []
                                        ],
                                    ],
                                    [
                                        'label' => 'add_postgresql_connections',
                                        'extra' => [
                                            'as-button' => true,
                                        ],
                                        'component' => 'link',
                                        'route' => [
                                            'database_postgresql',
                                            []
                                        ],
                                    ],
                                ],
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
];


$view['database_list'] = [
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

