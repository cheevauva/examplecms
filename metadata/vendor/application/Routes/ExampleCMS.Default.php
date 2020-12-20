<?php

$routes['cli-setup']['edit'] = array(
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
$routes['cli']['default'] = array(
    'method' => 'GET',
    'route' => '/help/[a:command]',
    'target' => array(
        'action' => 'Cli\Help',
    ),
);
$routes['cli']['install'] = array(
    'method' => 'GET',
    'route' => '/install',
    'target' => array(
        'module' => 'Installer',
        'action' => 'Cli\Install',
    ),
);
$routes['cli']['generate'] = array(
    'method' => 'GET',
    'route' => '/generate/model',
    'target' => array(
        'module' => 'generator',
        'action' => 'model_generator',
        'readlines' => array(
            'do_attach_to_model' => 'Прикрепить к модулю? (y,n):',
            'attach_module' => 'Укажите названием модуля для прикрепления:',
            'namespace' => 'ExampleCMS\Module\(Укажите пространство имен)\Model: ',
        ),
    ),
);
$routes['rest']['default'] = array(
    'method' => 'GET',
    'route' => '/',
    'target' => array(
        'operation' => 'index',
        'module' => 'grids',
        'view' => 'json-index',
    ),
);
$routes['rest']['index'] = array(
    'method' => 'GET',
    'route' => '/[a:module]',
    'target' => array(
        'operation' => 'index',
        'view' => 'json-index',
        'firewall' => true,
    ),
);
$routes['rest']['read'] = array(
    'method' => 'GET',
    'route' => '/[a:module]/read/[*:id]',
    'target' => array(
        'operation' => 'read',
        'view' => 'json-read',
        'firewall' => true,
    ),
);
$routes['rest']['grids_designer'] = array(
    'method' => 'GET',
    'route' => '/grids/designer/[*:id]',
    'target' => array(
        'module' => 'grids',
        'operation' => 'read',
        'view' => 'json-designer',
        'firewall' => true,
    ),
);
$routes['rest']['grid_designer_update'] = array(
    'method' => 'POST',
    'route' => '/grids/designer/[*:id]',
    'target' => array(
        'module' => 'grids',
        'action' => 'designer-update',
        'operation' => 'edit',
        'view' => 'json-designer',
        'firewall' => true,
    ),
);
$routes['web-setup']['edit'] = array(
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
$routes['web-setup']['do_edit'] = array(
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
$routes['web']['default'] = array(
    'method' => 'GET',
    'route' => '/',
    'target' => array(
        'operation' => 'index',
        'module' => 'pages',
        'layout' => 'index',
    ),
);
$routes['web']['index'] = array(
    'method' => 'GET',
    'route' => '/[a:module]',
    'target' => array(
        'operation' => 'index',
        'layout' => 'index',
        'firewall' => true,
    ),
);
$routes['web']['read'] = array(
    'method' => 'GET',
    'route' => '/[a:module]/read/[*:id]',
    'target' => array(
        'operation' => 'read',
        'layout' => 'read',
        'firewall' => true,
    ),
);
$routes['web']['delete'] = array(
    'method' => 'GET',
    'route' => '/[a:module]/delete/[i:id]',
    'target' => array(
        'operation' => 'delete',
        'action' => 'delete',
        'layout' => 'delete',
        'firewall' => true,
    ),
);
$routes['web']['create'] = array(
    'method' => 'GET',
    'route' => '/[a:module]/create',
    'target' => array(
        'operation' => 'create',
        'action' => 'form',
        'layout' => 'create',
        'form' => 'create',
    ),
);
$routes['web']['do_create'] = array(
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
$routes['web']['edit'] = array(
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
$routes['web']['do_edit'] = array(
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
$routes['web']['login'] = array(
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
$routes['web']['do_login'] = array(
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
$routes['web']['logout'] = array(
    'method' => 'GET',
    'route' => '/users/logout',
    'target' => array(
        'operation' => 'logout',
        'module' => 'users',
        'view' => 'logout',
        'firewall' => true,
    ),
);
$routes['web']['grid_designer'] = array(
    'method' => 'GET',
    'route' => '/grids/designer/[*:id]',
    'target' => array(
        'module' => 'grids',
        'operation' => 'edit',
        'layout' => 'designer',
        'firewall' => true,
    ),
);
