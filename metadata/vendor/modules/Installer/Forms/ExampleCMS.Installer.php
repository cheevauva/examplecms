<?php

$forms['database'] = array(
    'name' => 'database',
    'type' => 'base',
    'method' => 'POST',
    'route' => 'database_save',
    'datasource' => 'installer-model',
    'mapping' => array(
        'mysql_host' => 'host',
        'mysql_username' => 'username',
        'mysql_password' => 'password',
        'mysql_database' => 'database',
    ),
);

$forms['language'] = array(
    'name' => 'language',
    'type' => 'base',
    'method' => 'POST',
    'route' => 'language_save',
    'datasource' => 'installer-model',
    'mapping' => array(
        'language' => 'language',
    ),
);
