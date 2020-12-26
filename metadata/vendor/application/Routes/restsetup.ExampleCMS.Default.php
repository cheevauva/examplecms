<?php

$routes['default'] = array(
    'method' => 'GET',
    'route' => '*',
    'target' => array(
        'layout' => 'json',
        'module' => 'Installer',
    ),
);
