<?php

$routes['edit'] = array(
    'method' => 'GET',
    'route' => '*',
    'target' => array(
        'module' => 'Installer',
        'id' => 'setup',
        'operation' => 'edit',
        'view' => 'form',
        'form' => 'edit',
        'layout' => 'setup',
        'action' => 'save',
    ),
);