<?php

$forms['database'] = array(
    'name' => 'database',
    'component' => 'base',
    'method' => 'POST',
    'route' => 'database_save',
    'mapping' => array(
        'mysql_host' => 'host',
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
    'mapping' => array(
        'language' => 'language',
    ),
);
