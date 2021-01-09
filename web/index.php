<?php

require '../bootstrap.php';

use ExampleCMS\Bootstrap;
use Laminas\Diactoros\ServerRequestFactory;

$request = ServerRequestFactory::fromGlobals();
$bootstrap = new Bootstrap(dirname(__DIR__) . '/');
$response = $bootstrap->getApplication()->run($request->withAttribute('application', 'web'));

$bootstrap->sendResponse($response);
