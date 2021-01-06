<?php

$routes['default'] = array(
    'method' => 'GET',
    'route' => '*',
    'target' => array(
        'layout' => 'rest',
        'module' => 'Installer',
    ),
);
