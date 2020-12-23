<?php

if (PHP_SAPI !== 'cli') {
    die;
}

require __DIR__ . '/../bootstrap.php';

$bootstrap = new ExampleCMS\Bootstrap('cli', dirname(__DIR__) . '/');

$app = $bootstrap->getApplication();

$request = \Zend\Diactoros\ServerRequestFactory::fromGlobals();
$request = $request->withAttribute('argv', $_SERVER['argv'])->withAttribute('argc', $_SERVER['argc']);

if ($_SERVER['argc'] > 1) {
    $request = $request->withUri(new \Zend\Diactoros\Uri($_SERVER['argv'][1]));
}

if ($_SERVER['argc'] > 2) {
    $data = [];
    parse_str($_SERVER['argv'][2], $data);
    
    $request = $request->withParsedBody($data)->withMethod('POST');
}

$response = $app->run($request, new \Zend\Diactoros\Response());

echo $response->getBody();
