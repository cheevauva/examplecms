<?php

$responders['layouts.empty'] = array(
    'type' => 'basic',
    'template' => 'empty',
    'views' => array(
    ),
);
$responders['layouts.setup'] = array(
    'type' => 'basic',
    'template' => 'setup',
    'views' => array(
        'body' => array(
            'type' => 'form',
            'grid' => 'form',
            'module' => 'Installer',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
