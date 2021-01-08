<?php

require '../../bootstrap.php';

use ExampleCMS\Bootstrap;
use Laminas\Diactoros\ServerRequestFactory;

$request = ServerRequestFactory::fromGlobals();
$bootstrap = new Bootstrap(dirname(dirname(__DIR__)) . '/');
$response = $bootstrap->getApplication()->run($request->withAttribute('application', 'rest'));

$bootstrap->sendResponse($response);