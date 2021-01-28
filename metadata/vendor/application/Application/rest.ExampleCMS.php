<?php

$application['contentType'] = 'application/json';
$application['middleware'][ExampleCMS\Application\Middleware\BasePath::class] = 100;
$application['middleware'][ExampleCMS\Application\Middleware\Rest\OopsHandler::class] = 300;
$application['middleware'][ExampleCMS\Application\Middleware\Router::class] = 400;
$application['middleware'][ExampleCMS\Application\Middleware\PresetModule::class] = 409;
$application['middleware'][ExampleCMS\Application\Middleware\Rest\FrontController::class] = 500;
