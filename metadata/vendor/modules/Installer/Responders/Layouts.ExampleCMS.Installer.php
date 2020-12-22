<?php

$layouts['empty'] = array(
    'component' => 'basic',
    'template' => 'empty',
    'views' => array(
    ),
);
$layouts['setup'] = array(
    'component' => 'basic',
    'template' => 'setup',
    'views' => array(
        'body' => array(
            'component' => 'form',
            'grids' => [
                'form',
            ],
            'module' => 'Installer',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
