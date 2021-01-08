<?php

$di[ExampleCMS\Module\Installer\Query\Find::class] = array(
    'cacheFactory' => ExampleCMS\Factory\Cache::class,
);
$di[ExampleCMS\Module\Installer\Query\Save::class] = array(
    'cacheFactory' => ExampleCMS\Factory\Cache::class,
);
$di[ExampleCMS\Module\Installer\Middleware\LicenseAcceptChecker::class] = array(
    'config' => ExampleCMS\Config::class,
    'moduleFactory' => ExampleCMS\Factory\Module::class,
);
$di[ExampleCMS\Module\Installer\Action\License::class] = array(
    'filesystem' => ExampleCMS\Filesystem::class,
);
