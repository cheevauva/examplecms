<?php

require '../../bootstrap.php';

$bootstrap = new ExampleCMS\Bootstrap;

$app = $bootstrap->getApplication('rest', dirname(dirname(__DIR__)) . '/');
echo trim($app->getContent());
