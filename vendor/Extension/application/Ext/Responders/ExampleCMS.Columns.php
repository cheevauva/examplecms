<?php

foreach (array(
    'columns.name_label' => array(
        'type' => 'header',
        'fields' => array(
            array(
                'type' => 'label',
                'label' => 'name',
            ),
        ),
    ),
    'columns.name' => array(
        'type' => 'default',
        'fields' => array(
            'name',
        ),
    ),
    'columns.actions_label' => array(
        'type' => 'default',
        'fields' => array(
            array(
                'type' => 'label',
                'label' => 'actions',
            ),
        ),
    ),
    'columns.actions' => array(
        'type' => 'default',
        'fields' => array(
            'action_edit',
            'action_read',
        ),
    ),
) as $name => $value) {
    $responders[$name] = $value;
}
