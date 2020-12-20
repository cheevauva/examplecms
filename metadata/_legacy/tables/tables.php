<?php

return array(
    'fields' => array(
        'type' => 'config',
        'path' => 'fields',
        'depth' => 2,
        'fields' => array(
            'module' => array(
                'name' => 'module',
                'type' => 'string',
            ),
            'name' => array(
                'name' => 'name',
                'type' => 'string',
                'route' => 'read',
            ),
            'type' => array(
                'name' => 'type',
                'type' => 'enum',
                'options' => array(
                    'string',
                    'enum',
                    'float',
                    'int',
                    'date',
                    'datetime'
                ),
            ),
        ),
    ),
    'layouts' => array(
        'type' => 'config',
        'path' => 'layouts',
        'depth' => 2,
    ),
    'routes' => array(
        'type' => 'config',
        'path' => 'routes',
        'depth' => 1,
        'fields' => array(
            'routes' => array(
                'id' => array(
                    'name' => 'id',
                    'type' => 'string',
                ),
                'method' => array(
                    'name' => 'method',
                    'type' => 'string',
                ),
                'route' => array(
                    'name' => 'route',
                    'type' => 'string',
                ),
                'operation' => array(
                    'name' => 'operation',
                    'type' => 'string',
                ),
            ),
        ),
    ),
    'configuration' => array(
        'type' => 'config',
        'path' => '',
        'depth' => 1,
    ),
    'tables' => array(
        'type' => 'config',
        'path' => 'tables',
        'depth' => 1,
    ),
    'categories' => array(
        'type' => 'database',
        'connection' => 'default',
        'name' => 'categories',
        'fields' => array(
            'id' => array(
                'type' => 'int',
            ),
            'name' => array(
                'type' => 'varchar',
                'label' => 'Название',
            ),
            'parent_type' => array(
                'type' => 'varchar',
                'label' => 'Модуль',
            ),
            'parent_id' => array(
                'type' => 'varchar',
                'label' => 'Идентификатор',
            ),
        ),
    ),
    'connections' => array(
        'type' => 'config',
        'path' => 'connections',
        'depth' => 1,
    ),
    'users' => array(
        'type' => 'database',
        'connection' => 'default',
        'name' => 'users',
        'fields' => array(
            'id' => array(
                'label' => 'id',
                'type' => 'int',
                'required' => true,
            ),
            'username' => array(
                'type' => 'varchar',
                'label' => 'username',
                'required' => true,
            ),
            'password' => array(
                'type' => 'varchar',
                'label' => 'password',
                'required' => true,
            ),
            'role' => array(
                'type' => 'varchar',
                'label' => 'role',
                'required' => true,
                'default' => 'guest',
            ),
        ),
    ),
);
