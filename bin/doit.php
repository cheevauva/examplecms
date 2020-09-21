<?php

if (PHP_SAPI !== 'cli') {
    die;
}

require __DIR__ . '/../bootstrap.php';

$bootstrap = new ExampleCMS\Bootstrap('cli', dirname(__DIR__) . '/');

$app = $bootstrap->getApplication();

$request = \Zend\Diactoros\ServerRequestFactory::fromGlobals();

$response = $app->run($request, new \Zend\Diactoros\Response());

echo $response->getBody();
