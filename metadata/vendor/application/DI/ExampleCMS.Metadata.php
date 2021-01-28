<?php


$di[ExampleCMS\Metadata::class] = array(
    'metadataHandlerFactory' => '?metadataHandlerFactory',
);
$di[ExampleCMS\Metadata\Handler\Cache::class] = array(
    'cache' => '?cacheMemory',
);
$di[ExampleCMS\Metadata\Handler\ApplicationModule::class] = array(
    'metadataHandlerFactory' => '?metadataHandlerFactory',
);
$di[ExampleCMS\Metadata\Handler\Application::class] = array(
    'filesystem' => '?filesystem',
);
$di[ExampleCMS\Metadata\Handler\Module::class] = array(
    'filesystem' => '?filesystem',
);
