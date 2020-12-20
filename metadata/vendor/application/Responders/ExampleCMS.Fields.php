<?php

foreach (array(
    'fields.name' => array(
        'name' => 'name',
        'type' => 'link',
        'route' => 'read',
        'use_label' => false,
    ),
    'fields.action_edit' => array(
        'type' => 'link',
        'label' => 'edit',
        'route' => 'edit',
        'use_label' => true,
        'name' => 'Edit',
    ),
    'fields.action_read' => array(
        'type' => 'link',
        'label' => 'read',
        'route' => 'read',
        'use_label' => true,
        'name' => 'Read',
    ),
) as $name => $value) {
    $responders[$name] = $value;
}
