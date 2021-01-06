<?php

$forms['database'] = array(
    'name' => 'database',
    'component' => 'base',
    'method' => 'POST',
    'route' => 'database_save',
    'map' => array(
        'sql_engine' => 'engine',
        'mysql_host' => 'host',
        'sqlite_filename' => 'filename',
        'mysql_username' => 'username',
        'mysql_password' => 'password',
        'mysql_database' => 'database',
    ),
);

$forms['language'] = array(
    'name' => 'language',
    'component' => 'base',
    'method' => 'POST',
    'route' => 'language_save',
    'map' => array(
        'installer' => 'language_installer',
        'system' => 'language_system'
    ),
);

$forms['license'] = array(
    'name' => 'license',
    'component' => 'base',
    'method' => 'POST',
    'route' => 'license_save',
    'map' => array(
        'accept' => 'license_accepted',
    ),
    'map_out' => array(
        'license' => 'license',
    ),
);
