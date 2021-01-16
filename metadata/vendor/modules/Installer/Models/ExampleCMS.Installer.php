<?php

$models['database'] = array(
    'name' => 'database',
    'component' => 'form',
    'map' => array(
        'sql_engine' => 'engine',
        'mysql_host' => 'host',
        'sqlite_filename' => 'filename',
        'mysql_username' => 'username',
        'mysql_password' => 'password',
        'mysql_database' => 'database',
    ),
);

$models['language'] = array(
    'name' => 'language',
    'component' => 'form',
    'map' => array(
        'installer' => 'language_installer',
        'system' => 'language_system'
    ),
);

$models['license'] = array(
    'name' => 'license',
    'component' => 'form',
    'map' => array(
        'accept' => 'license_accepted',
    ),
    'map_out' => array(
        'license' => 'license',
    ),
);
$models['base'] = array(
    'name' => 'base',
    'component' => 'model',
);