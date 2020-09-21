<?php

return array(
    'name' => 'roles',
    'type' => 'database',
    'connection' => 'default',
    'fields' => array(
        'id' => array(
            'type' => 'int',
        ),
        'operation' => array(
            'type' => 'string',
            'label' => 'operation',
        ),
        'access' => array(
            'type' => 'string',
            'label' => 'access',
        ),
    ),
);
