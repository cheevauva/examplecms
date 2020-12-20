<?php

$routes['default'] = array(
    'method' => 'GET',
    'route' => '/',
    'target' => array(
        'operation' => 'index',
        'module' => 'pages',
        'layout' => 'index',
    ),
);
$routes['index'] = array(
    'method' => 'GET',
    'route' => '/[a:module]',
    'target' => array(
        'operation' => 'index',
        'layout' => 'index',
        'firewall' => true,
    ),
);
$routes['read'] = array(
    'method' => 'GET',
    'route' => '/[a:module]/read/[*:id]',
    'target' => array(
        'operation' => 'read',
        'layout' => 'read',
        'firewall' => true,
    ),
);
$routes['delete'] = array(
    'method' => 'GET',
    'route' => '/[a:module]/delete/[i:id]',
    'target' => array(
        'operation' => 'delete',
        'action' => 'delete',
        'layout' => 'delete',
        'firewall' => true,
    ),
);
$routes['create'] = array(
    'method' => 'GET',
    'route' => '/[a:module]/create',
    'target' => array(
        'operation' => 'create',
        'action' => 'form',
        'layout' => 'create',
        'form' => 'create',
    ),
);
$routes['do_create'] = array(
    'method' => 'POST',
    'route' => '/[a:module]/create',
    'target' => array(
        'operation' => 'create',
        'action' => 'save',
        'layout' => 'create',
        'form' => 'create',
        'firewall' => true,
    ),
);
$routes['edit'] = array(
    'method' => 'GET',
    'route' => '/[a:module]/edit/[i:id]',
    'target' => array(
        'operation' => 'edit',
        'view' => 'form',
        'layout' => 'edit',
        'form' => 'edit',
        'card' => 'form',
        'firewall' => true,
    ),
);
$routes['do_edit'] = array(
    'method' => 'POST',
    'route' => '/[a:module]/edit/[i:id]',
    'target' => array(
        'route' => 'do_edit',
        'operation' => 'edit',
        'action' => 'save',
        'view' => 'json',
        'form' => 'edit',
        'firewall' => true,
    ),
);
$routes['login'] = array(
    'method' => 'GET',
    'route' => '/users/login',
    'target' => array(
        'operation' => 'login',
        'module' => 'users',
        'view' => 'form',
        'form' => 'login',
        'card' => 'form',
        'firewall' => true,
    ),
);
$routes['do_login'] = array(
    'method' => 'POST',
    'route' => '/users/login',
    'target' => array(
        'operation' => 'login',
        'module' => 'users',
        'view' => 'login',
        'form' => 'login',
        'firewall' => true,
    ),
);
$routes['logout'] = array(
    'method' => 'GET',
    'route' => '/users/logout',
    'target' => array(
        'operation' => 'logout',
        'module' => 'users',
        'view' => 'logout',
        'firewall' => true,
    ),
);
$routes['grid_designer'] = array(
    'method' => 'GET',
    'route' => '/grids/designer/[*:id]',
    'target' => array(
        'module' => 'grids',
        'operation' => 'edit',
        'layout' => 'designer',
        'firewall' => true,
    ),
);
