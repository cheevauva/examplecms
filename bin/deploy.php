<?php

$application = 'cli';
$onlyAutoloadStage = true;

if (PHP_SAPI !== 'cli') {
    die;
}

require __DIR__ . '/../bootstrap.php';

$basePaths = [
    'metadata/vendor',
    'metadata/custom',
];
$targetPath = 'cache/metadata';

$mergeFiles = new ExampleCMS\Helper\MergeFiles;
$mergeFiles->execute([
    $mergeFiles::PATHTARGET => $targetPath,
    $mergeFiles::PATHBASE => $basePaths,
    $mergeFiles::PATH => 'Extensions',
    $mergeFiles::LEVEL => 'application',
    $mergeFiles::SECTION => 'extensions',
]);
$mergeFiles->execute([
    $mergeFiles::PATHTARGET => $targetPath,
    $mergeFiles::PATHBASE => $basePaths,
    $mergeFiles::PATH => 'Modules',
    $mergeFiles::LEVEL => 'application',
    $mergeFiles::SECTION => 'modules',
]);

$extensions = [];
$modules = [];

require $targetPath . '/application/Extensions.php';
require $targetPath . '/application/Modules.php';

foreach ($extensions as $extension) {
    $mergeFiles->execute([
        $mergeFiles::PATHTARGET => $targetPath,
        $mergeFiles::PATHBASE => $basePaths,
        $mergeFiles::MODULES => array_keys($modules),
        $mergeFiles::PATH => $extension['extdir'],
        $mergeFiles::LEVEL => !empty($extension['level']) ? $extension['level'] : '',
        $mergeFiles::SECTION => $extension['section'],
        $mergeFiles::NAME => !empty($extension['name']) ? $extension['name'] : '',
        $mergeFiles::FILTER => !empty($extension['filter']) ? $extension['filter'] : '',
    ]);
}