<?php

return array(
    'name' => 'comments',
    'type' => 'database',
    'connection' => 'default',
    'fields' => array(
        'id' => array(
            'type' => 'int',
        ),
        'parent_type' => array(
            'type' => 'text',
            'label' => 'Модуль',
        ),
        'parent_id' => array(
            'type' => 'text',
            'label' => 'Идентификатор',
        ),
        'message' => array(
            'type' => 'text',
            'label' => 'Текст',
        ),
    ),
);
