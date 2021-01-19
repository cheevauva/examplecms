<?php

$layout['empty'] = array(
    'component' => 'basic',
    'template' => 'empty',
    'views' => array(
    ),
);
$layout['setup'] = array(
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
$layout['exception'] = array(
    'component' => 'exception',
    'template' => 'setup',
    'views' => array(
        'body' => array(
            'component' => 'exception',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
