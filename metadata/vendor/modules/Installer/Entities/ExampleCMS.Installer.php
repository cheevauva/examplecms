<?php

$entities['database'] = [
    'name' => 'database',
    'component' => 'database',
    'mappers' => [
        'decode' => [
            'component' => 'decodeUserScope',
            'map' => [
                'engine' => 'sql_engine',
                'host' => 'mysql_host',
                'filename' => 'sqlite_filename',
                'username' => 'mysql_username',
                'password' => 'mysql_password',
                'database' => 'mysql_database',
            ],
        ],
        'encode' => [
            'component' => 'encodeUserScope',
            'map' => [
                'engine' => 'sql_engine',
                'host' => 'mysql_host',
                'filename' => 'sqlite_filename',
                'username' => 'mysql_username',
                'password' => 'mysql_password',
                'database' => 'mysql_database',
            ],
        ],
    ],
];

$entities['language'] = [
    'name' => 'language',
    'component' => 'form',
    'mappers' => [
        'decode' => [
            'component' => 'decodeUserScope',
            'map' => [
                'language_installer' => 'installer',
                'language_system' => 'system'
            ],
        ],
        'encode' => [
            'component' => 'encodeUserScope',
            'map' => [
                'language_installer' => 'installer',
                'language_system' => 'system'
            ],
        ],
    ],
];

$entities['license'] = [
    'name' => 'license',
    'component' => 'license',
    'mappers' => [
        'decode' => [
            'component' => 'decodeUserScope',
            'map' => [
                'license_accepted' => 'accept',
            ],
        ],
        'encode' => [
            'component' => 'encodeUserScope',
            'map' => [
                'license_accepted' => 'accept',
            ],
        ],
    ]
];
$entities['base'] = array(
    'name' => 'base',
    'component' => 'persistent',
    'mappers' => [
        'decode' => [
            'component' => 'decodeStorage',
            'map' => [
            ],
        ],
        'encode' => [
            'component' => 'encodeStorage',
            'map' => [
            ],
        ],
        'language2context' => [
            'component' => 'entity-to-context',
            'map' => [
                'language_installer' => 'language',
            ],
        ],
    ],
    'relations' => [
        'items' => [
            'name' => 'items',
            'component' => 'relation',
            'id-current' => 'entity_id',
            'id-related' => 'entity_related_id',
            'mappers' => [
                'encode' => [
                    'component' => 'encodeStorage',
                    'map' => [],
                ],
            ],
        ],
    ],
);
