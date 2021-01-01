<?php

$handlers['themes'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Themes.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);

$handlers['theme_assets'] = array(
    'route' => [
        'application' => 'theme_assets_app',
        'module' => 'theme_assets_mod',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
    'cache' => [
        'disable' => true,
    ],
);
$handlers['theme_assets_app'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Themes/$1/Assets.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
$handlers['theme_assets_mod'] = array(
    'route' => [
        'module' => 'cache/metadata/modules/$2/Themes/$1/Assets.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Module',
);

$handlers['theme_templates'] = array(
    'route' => [
        'application' => 'theme_templates_app',
        'module' => 'theme_templates_mod',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\ApplicationModule',
    'cache' => [
        'disable' => true,
    ],
);
$handlers['theme_templates_app'] = array(
    'route' => [
        'application' => 'cache/metadata/application/Themes/$1/Templates.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Application',
);
$handlers['theme_templates_mod'] = array(
    'route' => [
        'module' => 'cache/metadata/modules/$2/Themes/$1/Templates.php',
    ],
    'component' => 'ExampleCMS\Metadata\Handler\Module',
);
