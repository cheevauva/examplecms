<?php

return array(
    'base' => array(
        'semantic_url' => false,
        'setup' => true,
        'logger' => array(
            'name' => 'examplecms',
            'level' => 'ERROR',
            'path' => 'examplecms.log'
        ),
        'cache' => array(
            'engine' => 'memory',
        ),
    ),
);
