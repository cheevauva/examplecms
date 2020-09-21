<?php

return array(
    'name' => 'menuitems',
    'type' => 'database',
    'connection' => 'default',
    'fields' => array(
        'id' => array(
            'type' => 'int',
        ),
        'route' => array(
            'type' => 'string',
            'label' => 'route',
        ),
        'label' => array(
            'type' => 'string',
            'label' => 'label',
        ),
        'module' => array(
            'type' => 'string',
            'label' => 'module',
        ),
    ),
);
