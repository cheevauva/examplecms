<?php

$applications['middleware'][ExampleCMS\Application\Middleware\BasePath::class] = 100;
$applications['middleware'][ExampleCMS\Application\Middleware\Rest\OopsHandler::class] = 300;
$applications['middleware'][ExampleCMS\Application\Middleware\Router::class] = 400;
$applications['middleware'][ExampleCMS\Application\Middleware\PresetModule::class] = 409;
$applications['middleware'][ExampleCMS\Application\Middleware\PresetContentTypeJson::class] = 410;
$applications['middleware'][ExampleCMS\Application\Middleware\Rest\FrontController::class] = 500;
