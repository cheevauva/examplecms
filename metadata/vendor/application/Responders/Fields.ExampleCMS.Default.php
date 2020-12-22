<?php

$fields['name'] = array(
    'name' => 'name',
    'component' => 'link',
    'route' => 'read',
    'use_label' => false,
);
$fields['action_edit'] = array(
    'component' => 'link',
    'label' => 'edit',
    'route' => 'edit',
    'use_label' => true,
    'name' => 'Edit',
);
$fields['action_read'] = array(
    'component' => 'link',
    'label' => 'read',
    'route' => 'read',
    'use_label' => true,
    'name' => 'Read',
);
