<?php

$handlers['responders'] = array(
    'route' => [
        'application' => 'responders_app',
        'module' => 'responders_mod',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
    'cache' => [
        'disable' => true,
    ]
);
$handlers['responders_app'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Responders/$1.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
$handlers['responders_mod'] = array(
    'route' => [
        'module' => 'cache/metadata/modules/$2/Responders/$1.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Module',
);
