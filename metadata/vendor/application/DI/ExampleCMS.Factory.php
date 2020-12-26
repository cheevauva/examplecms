<?php

$di['ExampleCMS\Factory\Factory'] = array(
    'metadata' => 'ExampleCMS\Metadata',
    'container' => 'ExampleCMS\Container',
);
$di['ExampleCMS\Factory\MetadataHandler'] = array(
    'filesystem' => 'ExampleCMS\Filesystem',
);
