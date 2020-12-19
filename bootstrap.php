<?php

$GLOBALS['EXAMPLECMS_TIMESTART'] = microtime(true);
$GLOBALS['EXAMPLECMS_MERMORYSTART'] = memory_get_usage();

error_reporting(E_ALL);

set_error_handler(function ($error, $message) {
    throw new \Exception($message, $error);
});

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);
chdir(__DIR__);
require_once 'composer/autoload.php';
