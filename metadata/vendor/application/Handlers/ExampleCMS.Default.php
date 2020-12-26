<?php

$handlers['modules'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Modules.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
    'section' => 'applications',
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

$handlers['applications'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Applications/$1.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
