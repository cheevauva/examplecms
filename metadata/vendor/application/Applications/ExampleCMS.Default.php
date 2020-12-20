<?php

$applications['web'] = array(
    'middleware' => array(
        'ExampleCMS\Middleware\BasePath',
        'ExampleCMS\Middleware\Session',
        'ExampleCMS\Middleware\OopsHandler',
        'ExampleCMS\Middleware\Router',
        'ExampleCMS\Middleware\Application',
    ),
);

$applications['cli'] = array(
    'middleware' => array(
        'ExampleCMS\Middleware\OopsHandler',
        'ExampleCMS\Middleware\CliExtractArgs',
        'ExampleCMS\Middleware\Router',
        'ExampleCMS\Middleware\CliReadData',
        'ExampleCMS\Middleware\Application',
    ),
);
