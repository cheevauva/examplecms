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

$bootstrap = new ExampleCMS\Bootstrap(__DIR__ . '/');

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals();
$request = $request->withAttribute('application', $application);
$request = $request->withAttribute('examplecms_timestart', microtime(true));

$response = $bootstrap->getApplication()->run($request);

$bootstrap->sendResponse($response);
