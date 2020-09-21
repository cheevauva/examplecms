<?php

return array(
    'edit' => array(
        'form' => 'edit',
        'type' => 'base',
        'method' => 'POST',
        'route' => 'do_edit',
        'datasource' => 'installer-model',
        'mapping' => array(
            'mysql_host' => 'host',
            'mysql_username' => 'username',
            'mysql_password' => 'password',
            'mysql_database' => 'database',
        ),
    ),
);
