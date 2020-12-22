<?php

$layouts['empty'] = array(
    'type' => 'basic',
    'template' => 'empty',
    'views' => array(
    ),
);
$layouts['setup'] = array(
    'type' => 'basic',
    'template' => 'setup',
    'views' => array(
        'body' => array(
            'type' => 'form',
            'grids' => [
                'type' => 'form',
            ],
            'module' => 'Installer',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
