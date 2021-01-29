<?php

$di[ExampleCMS\Module\Installer\Query\Find::class] = array(
    'cache' => '?cacheFile',
);
$di[ExampleCMS\Module\Installer\Query\Save::class] = array(
    'cache' => '?cacheFile',
);
$di[ExampleCMS\Module\Installer\Middleware\LicenseAcceptChecker::class] = array(
    'config' => '?config',
    'moduleFactory' => '?moduleFactory',
);
$di[ExampleCMS\Module\Installer\Responder\FieldTextFromFilesystem::class] = [
    'filesystem' => '?filesystem',
];
$di[ExampleCMS\Module\Installer\Action\Index::class] = [
    'collection' => '?collection',
];