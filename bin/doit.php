<?php

if (PHP_SAPI !== 'cli') {
    die;
}

require __DIR__ . '/../bootstrap.php';

use ExampleCMS\Bootstrap;
use Laminas\Diactoros\ServerRequestFactory;

$request = ServerRequestFactory::fromGlobals();
$request = $request->withAttribute('argv', $_SERVER['argv'])->withAttribute('argc', $_SERVER['argc']);

if ($_SERVER['argc'] > 1) {
    $request = $request->withUri(new \Zend\Diactoros\Uri($_SERVER['argv'][1]));
}

if ($_SERVER['argc'] > 2) {
    $data = [];
    parse_str($_SERVER['argv'][2], $data);

    $request = $request->withParsedBody($data)->withMethod('POST');
}

$bootstrap = new Bootstrap(dirname(__DIR__) . '/');
$response = $bootstrap->getApplication()->run($request->withAttribute('application', 'cli'));

echo $response->getBody();
