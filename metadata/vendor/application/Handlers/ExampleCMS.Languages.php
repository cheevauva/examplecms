<?php

$handlers['languages'] = array(
    'route' => [
        'application' => 'languages_app',
        'module' => 'languages_mod',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
    'cache' => [
        'disable' => true,
    ],
);
$handlers['languages_app'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Language/$1.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
$handlers['languages_mod'] = array(
    'route' => [
        'module' => 'cache/metadata/modules/$2/Language/$1.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Module',
);
