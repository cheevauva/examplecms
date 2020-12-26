<?php

$handlers['modules'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Modules.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
    'section' => 'applications',
);
$handlers['responders'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Responders/$1.php',
        'module' => 'cache/metadata/modules/$2/Responders/$1.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
    'section' => 'responders',
);
$handlers['components'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Components.php',
        'module' => 'cache/metadata/modules/$1/Components.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
    'section' => 'components',
);
$handlers['routes'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Routes/$1.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
$handlers['themes'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Themes.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
$handlers['forms'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Forms.php',
        'module' => 'cache/metadata/modules/$1/Forms.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
);
$handlers['applications'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Applications/$1.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
$handlers['languages'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Language/$2.php',
        'module' => 'cache/metadata/modules/$1/Language/$2.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
);
