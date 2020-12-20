<?php

return array(
    'name' => 'pages',
    'type' => 'database',
    'connection' => 'default',
    'fields' => array(
        'id' => array(
            'name' => 'id',
            'type' => 'int',
        ),
        'name' => array(
            'name' => 'name',
            'type' => 'string',
            'label' => 'name',
        ),
        'text' => array(
            'type' => 'text',
            'name' => 'text',
            'label' => 'text',
        ),
        'category_id' => array(
            'type' => 'int',
            'name' => 'category_id',
        ),
        'date_entered' => array(
            'type' => 'date',
        ),
        'category_name' => array(
            'label' => 'Категория',
            'type' => 'varchar',
            'source' => 'non-db',
            'id_name' => 'category_id',
            'module' => 'categories',
        ),
        'comments' => array(
            'type' => 'relate',
            'module' => 'comments',
            'relationship' => 'page_comments',
            'source' => 'non-db',
        ),
    ),
);
