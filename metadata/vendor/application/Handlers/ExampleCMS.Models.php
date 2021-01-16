<?php

$handlers['models'] = array(
    'route' => [
        'application' => 'models_app',
        'module' => 'models_mod',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
    'cache' => [
        'disable' => true,
    ],
);
$handlers['models_app'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Models.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
$handlers['models_mod'] = array(
    'route' => [
        'module' => 'cache/metadata/modules/$1/Models.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Module',
);
