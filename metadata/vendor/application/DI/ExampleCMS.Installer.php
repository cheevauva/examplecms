<?php

$di['ExampleCMS\Module\Installer\Query\Find'] = array(
    'cacheFactory' => 'ExampleCMS\Factory\Cache',
);

$di['ExampleCMS\Module\Installer\Query\Save'] = array(
    'cacheFactory' => 'ExampleCMS\Factory\Cache',
);
$di['ExampleCMS\Module\Installer\Middleware\LicenseAcceptChecker'] = array(
    'config' => 'ExampleCMS\Config',
    'moduleFactory' => 'ExampleCMS\Factory\Module',
);
$di['ExampleCMS\Module\Installer\Action\License'] = array(
    'filesystem' => 'ExampleCMS\Filesystem',
);