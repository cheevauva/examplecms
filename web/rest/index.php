<?php

require '../../bootstrap.php';

$bootstrap = new ExampleCMS\Bootstrap(dirname(dirname(__DIR__)) . '/');

$request = \Zend\Diactoros\ServerRequestFactory::fromGlobals();
$request = $request->withAttribute('application', 'rest');

$response = $bootstrap->getApplication()->run($request, new \Zend\Diactoros\Response());

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
