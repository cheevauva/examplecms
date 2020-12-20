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
        'firewall' => true,
    ),
);
$routes['do_edit'] = array(
    'method' => 'POST',
    'route' => '*',
    'target' => array(
        'module' => 'Installer',
        'id' => 'setup',
        'operation' => 'edit',
        'action' => 'save',
        'view' => 'json',
        'form' => 'edit',
        'layout' => 'setup',
    ),
);
