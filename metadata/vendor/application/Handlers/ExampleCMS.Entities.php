<?php

$handlers['entities'] = array(
    'route' => [
        'application' => 'entities_app',
        'module' => 'entities_mod',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
    'cache' => [
        'disable' => true,
    ],
);
$handlers['entities_app'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Entities.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
$handlers['entities_mod'] = array(
    'route' => [
        'module' => 'cache/metadata/modules/$1/Entities.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Module',
);
