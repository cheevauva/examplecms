<?php

if (!isset($application) && empty($onlyAutoloadStage)) {
    die(sprintf('%s, line %s, error: application must be defined in parent file', __FILE__, __LINE__));
}

error_reporting(E_ALL);

set_error_handler(function ($error, $message) {
    throw new \Exception($message, $error);
});

require_once 'vendor/autoload.php';

if (!empty($onlyAutoloadStage)) {
    return;
}

$container = new \PDIC\Container(require 'cache/metadata/application/DI.php', [
    'basePath' => __DIR__ . '/',
    'cachesMetadata' => require 'cache/metadata/application/Caches.php',
    'handlersMetadata' => require 'cache/metadata/application/Handlers.php',
    'configsMetadata' => require 'cache/metadata/application/Configs.php',
]);

/* @var $builder \ExampleCMS\Contract\ComponentBuilder */
$builder = $container->get('componentBuilder');
$builder($container());

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals();
$request = $request->withAttribute('application', $application);
$request = $request->withAttribute('examplecms_timestart', microtime(true));

/* @var $bootstrap \ExampleCMS\Bootstrap */
$bootstrap = $builder->make(ExampleCMS\Bootstrap::class);
$bootstrap->sendResponse($bootstrap->getApplication()->run($request));
