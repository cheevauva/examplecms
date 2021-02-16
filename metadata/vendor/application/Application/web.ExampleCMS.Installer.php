<?php

$application['middleware']['LicenseAcceptChecker'] = array(
    'order' => 412,
    'component' => ExampleCMS\Module\Installer\Middleware\LicenseAcceptChecker::class,
    'actions' => [
        [
            'component' => 'read',
            'entity' => 'license',
        ],
        [
            'component' => 'redirect-when-invalid-entity',
            'route' => 'license',
            'entity' => 'license',
        ]
    ],
);
