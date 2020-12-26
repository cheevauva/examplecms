<?php

$handlers['forms'] = array(
    'route' => [
        'application' => 'forms_app',
        'module' => 'forms_mod',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
    'cache' => [
        'disable' => true,
    ],
);
$handlers['forms_app'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Forms.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
$handlers['forms_mod'] = array(
    'route' => [
        'module' => 'cache/metadata/modules/$1/Forms.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Module',
);
