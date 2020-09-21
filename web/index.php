<?php

require '../bootstrap.php';

$bootstrap = new ExampleCMS\Bootstrap('web', dirname(__DIR__) . '/');

$app = $bootstrap->getApplication();
$request = \Zend\Diactoros\ServerRequestFactory::fromGlobals();

$response = $app->run($request, new \Zend\Diactoros\Response());

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
