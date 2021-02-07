<?php

$entities['database'] = array(
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

$entities['language'] = array(
    'name' => 'language',
    'component' => 'form',
    'map' => array(
        'installer' => 'language_installer',
        'system' => 'language_system'
    ),
);

$entities['license'] = array(
    'name' => 'license',
    'component' => 'form',
    'map' => array(
        'accept' => 'license_accepted',
    ),
    'map_out' => array(
        'license' => 'license',
    ),
);
$entities['base'] = array(
    'name' => 'base',
    'component' => 'persistent',
);