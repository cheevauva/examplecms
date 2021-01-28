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
$handlers['application'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Application/$1.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
