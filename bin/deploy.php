<?php

if (PHP_SAPI !== 'cli') {
    die;
}

require __DIR__ . '/../bootstrap.php';

$basePaths = [
    'vendor',
    'custom',
];


$mergeFiles = new ExampleCMS\Filesystem\MergeFiles;
$mergeFiles->execute([
    $mergeFiles::PATHBASE => $basePaths,
    $mergeFiles::PATH => 'Ext/Extensions',
    $mergeFiles::NAME => 'extensions.ext.php',
    $mergeFiles::LEVEL => 'application',
]);
$mergeFiles->execute([
    $mergeFiles::PATHBASE => $basePaths,
    $mergeFiles::PATH => 'Ext/Modules',
    $mergeFiles::NAME => 'modules.ext.php',
    $mergeFiles::LEVEL => 'application',
]);


$extensions = [];
$modules = [];

require 'vendor/application/Ext/Extensions/extensions.ext.php';
require 'vendor/application/Ext/Modules/modules.ext.php';

foreach ($extensions as $extension) {
    $mergeFiles->execute([
        $mergeFiles::PATHBASE => $basePaths,
        $mergeFiles::MODULES => array_keys($modules),
        $mergeFiles::PATH => 'Ext/' . $extension['extdir'],
        $mergeFiles::NAME => $extension['file'],
        $mergeFiles::LEVEL => !empty($extension['level']) ? $extension['level'] : '',
    ]);
}

$responders = [];

require 'vendor/application/Ext/Responders/responders.ext.php';


print_r(array_keys($responders));
