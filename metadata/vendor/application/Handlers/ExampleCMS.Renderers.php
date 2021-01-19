<?php

$handlers['renderer'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Renderer.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);

$handlers['renderer_assets'] = array(
    'route' => [
        'application' => 'renderer_assets_app',
        'module' => 'renderer_assets_mod',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
    'cache' => [
        'disable' => true,
    ],
);
$handlers['renderer_assets_app'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Renderer/$1/Assets.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
$handlers['renderer_assets_mod'] = array(
    'route' => [
        'module' => 'cache/metadata/modules/$2/Renderer/$1/Assets.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Module',
);

$handlers['renderer_templates'] = array(
    'route' => [
        'application' => 'renderer_templates_app',
        'module' => 'renderer_templates_mod',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
    'cache' => [
        'disable' => true,
    ],
);
$handlers['renderer_templates_app'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Renderer/$1/Templates.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
$handlers['renderer_templates_mod'] = array(
    'route' => [
        'module' => 'cache/metadata/modules/$2/Renderer/$1/Templates.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Module',
);
