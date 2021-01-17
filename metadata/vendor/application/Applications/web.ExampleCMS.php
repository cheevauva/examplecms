<?php

$applications['middleware'][ExampleCMS\Application\Middleware\BasePath::class] = 100;
$applications['middleware'][ExampleCMS\Application\Middleware\Session::class] = 200;
$applications['middleware'][ExampleCMS\Application\Middleware\PresetLanguageBySession::class] = 210;
$applications['middleware'][ExampleCMS\Application\Middleware\PresetThemeBySession::class] = 211;
$applications['middleware'][ExampleCMS\Application\Middleware\Web\OopsHandler::class] = 300;
$applications['middleware'][ExampleCMS\Application\Middleware\Router::class] = 400;
$applications['middleware'][ExampleCMS\Application\Middleware\PresetModule::class] = 409;
$applications['middleware'][ExampleCMS\Application\Middleware\PresetContentTypeHtml::class] = 410;
$applications['middleware'][ExampleCMS\Application\Middleware\Web\FrontController::class] = 500;
