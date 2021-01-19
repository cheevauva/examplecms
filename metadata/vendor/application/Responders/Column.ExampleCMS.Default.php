<?php

$column['name_label'] = array(
    'component' => 'header',
    'fields' => array(
        array(
            'component' => 'label',
            'label' => 'name',
        ),
    ),
);
$column['name'] = array(
    'component' => 'default',
    'fields' => array(
        'name',
    ),
);
$column['actions_label'] = array(
    'component' => 'default',
    'fields' => array(
        array(
            'component' => 'label',
            'label' => 'actions',
        ),
    ),
);
$column['actions'] = array(
    'component' => 'default',
    'fields' => array(
        'action_edit',
        'action_read',
    ),
);
