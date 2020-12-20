<?php

$extensions['routes_cli'] = [
    'section' => 'routes',
    'extdir' => 'Routes',
    'level' => 'application',
    'filter' => 'cli',
    'name' => 'cli',
];
$extensions['routes_web'] = [
    'section' => 'routes',
    'extdir' => 'Routes',
    'level' => 'application',
    'name' => 'web',
    'filter' => 'web',
];
$extensions['routes_cli_setup'] = [
    'section' => 'routes',
    'extdir' => 'Routes',
    'level' => 'application',
    'filter' => 'clisetup',
    'name' => 'clisetup',
];
$extensions['routes_web_setup'] = [
    'section' => 'routes',
    'extdir' => 'Routes',
    'level' => 'application',
    'filter' => 'websetup',
    'name' => 'websetup',
];
$extensions['routes_rest'] = [
    'section' => 'routes',
    'extdir' => 'Routes',
    'level' => 'application',
    'filter' => 'rest',
    'name' => 'rest',
];