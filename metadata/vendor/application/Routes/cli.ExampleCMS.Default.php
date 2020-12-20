<?php

$routes['default'] = array(
    'method' => 'GET',
    'route' => '/help/[a:command]',
    'target' => array(
        'action' => 'Cli\Help',
    ),
);
$routes['install'] = array(
    'method' => 'GET',
    'route' => '/install',
    'target' => array(
        'module' => 'Installer',
        'action' => 'Cli\Install',
    ),
);
$routes['generate'] = array(
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
