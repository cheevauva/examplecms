<?php

$di['?bootstrap'] = '*' . ExampleCMS\Bootstrap::class;
$di['?config'] = ExampleCMS\Config::class;
$di['?filesystem'] = ExampleCMS\Filesystem::class;
$di['?arrayHelper'] = \ExampleCMS\Helper\ArrayHelper::class;
$di['?application'] = '*' . ExampleCMS\Application::class;
$di['?router'] = '*' . ExampleCMS\Router::class;
$di['?httpResponse'] = '*' . Laminas\Diactoros\Response::class;
$di['?metadata'] = ExampleCMS\Metadata::class;
$di['?metadataHandlerCache'] = '*' . ExampleCMS\Metadata\Handler\Cache::class;
$di['?responderFactory'] = ExampleCMS\Factory\Responder::class;
$di['?configFactory'] = ExampleCMS\Factory\Config::class;
$di['?componentFactory'] = ExampleCMS\Factory\Component::class;
$di['?routerFactory'] = ExampleCMS\Factory\Router::class;
$di['?metadataHandlerFactory'] = ExampleCMS\Factory\MetadataHandler::class;
$di['?cacheFactory'] = ExampleCMS\Factory\Cache::class;
$di['?sessionFactory'] = ExampleCMS\Factory\Session::class;
$di['?moduleFactory'] = ExampleCMS\Factory\Module::class;
$di['?middlewareFactory'] = ExampleCMS\Factory\Middleware::class;
$di['?rendererFactory'] = ExampleCMS\Factory\Renderer::class;
$di['?sessionFile'] = '*' . ExampleCMS\Session\File::class;
$di['?sessionMemcached'] = '*' . ExampleCMS\Session\Memcached::class;

