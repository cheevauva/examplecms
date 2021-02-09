<?php

$di['?bootstrap'] = '*' . ExampleCMS\Bootstrap::class;
$di['?config'] = '~' . ExampleCMS\Config::class;
$di['?filesystem'] = ExampleCMS\Filesystem::class;
$di['?arrayHelper'] = \ExampleCMS\Helper\ArrayHelper::class;
$di['?application'] = '*' . ExampleCMS\Application::class;
$di['?httpResponse'] = '*' . Laminas\Diactoros\Response::class;
$di['?metadata'] = ExampleCMS\Metadata::class;
$di['?responderFactory'] = ExampleCMS\Factory\Responder::class;
$di['?configFactory'] = ExampleCMS\Factory\Config::class;
$di['?routerFactory'] = ExampleCMS\Factory\Router::class;
$di['?metadataHandlerFactory'] = ExampleCMS\Factory\MetadataHandler::class;
$di['?cacheFactory'] = ExampleCMS\Factory\Cache::class;
$di['?sessionFactory'] = ExampleCMS\Factory\Session::class;
$di['?moduleFactory'] = ExampleCMS\Factory\Module::class;
$di['?middlewareFactory'] = ExampleCMS\Factory\Middleware::class;
$di['?rendererFactory'] = ExampleCMS\Factory\Renderer::class;
$di['?context'] = '*' . ExampleCMS\Context::class;
$di['?cache'] = '~' . ExampleCMS\Cache\Cache::class;
$di['?cacheFile'] = '~' . ExampleCMS\Cache\File::class;
$di['?cacheMemcached'] = '~' . ExampleCMS\Cache\Memcached::class;
$di['?cacheMemory'] = '~' . ExampleCMS\Cache\Memory::class;
$di['?collection'] = '*' . ExampleCMS\Collection::class;
$di['?queryFactory'] = ExampleCMS\Factory\Query::class;
$di['?actionFactory'] = ExampleCMS\Factory\Action::class;
$di['?mapperFactory'] = ExampleCMS\Factory\Mapper::class;
$di['?entityFactory'] = ExampleCMS\Factory\Entity::class;
$di['?componentBuilder'] = ExampleCMS\ComponentBuilder::class;