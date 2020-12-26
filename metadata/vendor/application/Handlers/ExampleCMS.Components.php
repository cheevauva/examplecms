<?php

$handlers['components'] = array(
    'route' => [
        'application' => 'components_app',
        'module' => 'components_mod',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
    'section' => 'components',
    'cache' => [
        'disable' => true,
    ],
);
$handlers['components_app'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Components.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
    'section' => 'components',
);
$handlers['components_mod'] = array(
    'route' => [
        'module' => 'cache/metadata/modules/$1/Components.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Module',
    'section' => 'components',
);
