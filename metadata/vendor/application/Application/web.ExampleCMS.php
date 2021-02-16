<?php

$application['contentType'] = 'text/html';
$application['middleware']['BasePath'] = [
    'component' => ExampleCMS\Application\Middleware\BasePath::class,
    'order' => 100
];
$application['middleware']['Session'] = [
    'component' => ExampleCMS\Application\Middleware\Session::class,
    'order' => 200
];
$application['middleware']['PresetLanguageBySession'] = [
    'component' => ExampleCMS\Application\Middleware\PresetLanguageBySession::class,
    'order' => 210
];
$application['middleware']['PresetRendererBySession'] = [
    'component' => ExampleCMS\Application\Middleware\PresetRendererBySession::class,
    'order' => 211
];
$application['middleware']['OopsHandler'] = [
    'component' => ExampleCMS\Application\Middleware\Web\OopsHandler::class,
    'order' => 300
];
$application['middleware']['Router'] = [
    'component' => ExampleCMS\Application\Middleware\Router::class,
    'order' => 400
];
$application['middleware']['PresetModule'] = [
    'component' => ExampleCMS\Application\Middleware\PresetModule::class,
    'order' => 409
];
$application['middleware']['PresetResponder'] = [
    'component' => ExampleCMS\Application\Middleware\PresetResponder::class,
    'order' => 410
];
$application['middleware']['FrontController'] = [
    'component' => ExampleCMS\Application\Middleware\Web\FrontController::class,
    'order' => 500
];
