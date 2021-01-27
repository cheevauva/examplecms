<?php

$di[ExampleCMS\Module\Installer\Query\Find::class] = array(
    'cacheFactory' => '?cacheFactory',
);
$di[ExampleCMS\Module\Installer\Query\Save::class] = array(
    'cacheFactory' => '?cacheFactory',
);
$di[ExampleCMS\Module\Installer\Middleware\LicenseAcceptChecker::class] = array(
    'config' => '?config',
    'moduleFactory' => '?moduleFactory',
);
$di[ExampleCMS\Module\Installer\Responder\FieldTextFromFilesystem::class] = [
    'filesystem' => '?filesystem',
];
