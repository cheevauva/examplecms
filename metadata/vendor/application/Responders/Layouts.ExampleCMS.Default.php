<?php

$layouts['edit'] = array(
    'component' => 'basic',
    'views' => array(
        'header' => 'header',
        'body' => array(
            'component' => 'grid',
            'grid' => 'edit',
            'route' => 'do_create',
            'datasource' => 'context-model',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
$layouts['rest'] = array(
    'component' => 'rest',
);
$layouts['create'] = array(
    'component' => 'basic',
    'views' => array(
        'header' => 'header',
        'body' => array(
            'component' => 'grid',
            'grid' => 'form',
            'route' => 'do_create',
            'datasource' => 'context-model',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
$layouts['update'] = array(
    'component' => 'basic',
    'views' => array(
        'header' => 'header',
        'body' => array(
            'component' => 'grid',
            'grid' => 'form',
            'route' => 'do_update',
            'datasource' => 'context-model',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
$layouts['read'] = array(
    'component' => 'basic',
    'views' => array(
        'header' => 'header',
        'body' => array(
            'component' => 'grid',
            'grid' => 'read',
            'datasource' => 'collection',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
$layouts['index'] = array(
    'component' => 'basic',
    'views' => array(
        'header' => 'header',
        'body' => array(
            'component' => 'grid',
            'grid' => 'index',
            'datasource' => 'collection',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
$layouts['exception'] = array(
    'component' => 'exception',
    'views' => array(
        'body' => array(
            'component' => 'exception',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
