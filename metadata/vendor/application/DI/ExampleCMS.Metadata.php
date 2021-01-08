<?php

$di[ExampleCMS\Metadata::class] = array(
    'metadataHandlerFactory' => ExampleCMS\Factory\MetadataHandler::class,
);
$di[ExampleCMS\Metadata\Handler\Cache::class] = array(
    'cacheFactory' => ExampleCMS\Factory\Cache::class,
);
$di[ExampleCMS\Metadata\Handler\ApplicationModule::class] = array(
    'metadataHandlerFactory' => ExampleCMS\Factory\MetadataHandler::class,
);
