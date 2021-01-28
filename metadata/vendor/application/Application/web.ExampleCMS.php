<?php

$application['contentType'] = 'text/html';
$application['middleware'][ExampleCMS\Application\Middleware\BasePath::class] = 100;
$application['middleware'][ExampleCMS\Application\Middleware\Session::class] = 200;
$application['middleware'][ExampleCMS\Application\Middleware\PresetLanguageBySession::class] = 210;
$application['middleware'][ExampleCMS\Application\Middleware\PresetRendererBySession::class] = 211;
$application['middleware'][ExampleCMS\Application\Middleware\Web\OopsHandler::class] = 300;
$application['middleware'][ExampleCMS\Application\Middleware\Router::class] = 400;
$application['middleware'][ExampleCMS\Application\Middleware\PresetModule::class] = 409;
$application['middleware'][ExampleCMS\Application\Middleware\PresetResponder::class] = 410;
$application['middleware'][ExampleCMS\Application\Middleware\Web\FrontController::class] = 500;
