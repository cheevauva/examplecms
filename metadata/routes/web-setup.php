<?php

return array(
    'edit' => array(
        'method' => 'GET',
        'route' => '*',
        'target' => array(
            'module' => 'installer',
            'id' => 'setup',
            'operation' => 'edit',
            'view' => 'form',
            'form' => 'edit',
            'layout' => 'setup',
            'firewall' => true,
        ),
    ),
    'do_edit' => array(
        'method' => 'POST',
        'route' => '*',
        'target' => array(
            'module' => 'installer',
            'id' => 'setup',
            'operation' => 'edit',
            'action' => 'save',
            'view' => 'json',
            'form' => 'edit',
            'layout' => 'setup',
        ),
    ),
);
