<?php

$columns['name_label'] = array(
    'component' => 'header',
    'fields' => array(
        array(
            'component' => 'label',
            'label' => 'name',
        ),
    ),
);
$columns['name'] = array(
    'component' => 'default',
    'fields' => array(
        'name',
    ),
);
$columns['actions_label'] = array(
    'component' => 'default',
    'fields' => array(
        array(
            'component' => 'label',
            'label' => 'actions',
        ),
    ),
);
$columns['actions'] = array(
    'component' => 'default',
    'fields' => array(
        'action_edit',
        'action_read',
    ),
);
