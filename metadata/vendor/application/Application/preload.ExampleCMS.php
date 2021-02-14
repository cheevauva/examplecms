<?php

$application['contentType'] = 'application/json';
$application['middleware'][ExampleCMS\Application\Middleware\Preload::class] = 100;
