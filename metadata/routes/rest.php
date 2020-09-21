<?php

return array(
    'default' => array(
        'method' => 'GET',
        'route' => '/',
        'target' => array(
            'operation' => 'index',
            'module' => 'grids',
            'view' => 'json-index',
        ),
    ),
    'index' => array(
        'method' => 'GET',
        'route' => '/[a:module]',
        'target' => array(
            'operation' => 'index',
            'view' => 'json-index',
            'firewall' => true,
        ),
    ),
    'read' => array(
        'method' => 'GET',
        'route' => '/[a:module]/read/[*:id]',
        'target' => array(
            'operation' => 'read',
            'view' => 'json-read',
            'firewall' => true,
        ),
    ),
    'grids_designer' => array(
        'method' => 'GET',
        'route' => '/grids/designer/[*:id]',
        'target' => array(
            'module' => 'grids',
            'operation' => 'read',
            'view' => 'json-designer',
            'firewall' => true,
        ),
    ),
    'grid_designer_update' => array(
        'method' => 'POST',
        'route' => '/grids/designer/[*:id]',
        'target' => array(
            'module' => 'grids',
            'action' => 'designer-update',
            'operation' => 'edit',
            'view' => 'json-designer',
            'firewall' => true,
        ),
    ),
);
