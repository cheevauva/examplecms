<?php

$layouts['edit'] = array(
    'type' => 'basic',
    'views' => array(
        'header' => 'header',
        'body' => array(
            'type' => 'grid',
            'grid' => 'edit',
            'route' => 'do_create',
            'datasource' => 'context-model',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
$layouts['rest'] = array(
    'type' => 'rest',
);
$layouts['create'] = array(
    'type' => 'basic',
    'views' => array(
        'header' => 'header',
        'body' => array(
            'type' => 'grid',
            'grid' => 'form',
            'route' => 'do_create',
            'datasource' => 'context-model',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
$layouts['update'] = array(
    'type' => 'basic',
    'views' => array(
        'header' => 'header',
        'body' => array(
            'type' => 'grid',
            'grid' => 'form',
            'route' => 'do_update',
            'datasource' => 'context-model',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
$layouts['read'] = array(
    'type' => 'basic',
    'views' => array(
        'header' => 'header',
        'body' => array(
            'type' => 'grid',
            'grid' => 'read',
            'datasource' => 'collection',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
$layouts['index'] = array(
    'type' => 'basic',
    'views' => array(
        'header' => 'header',
        'body' => array(
            'type' => 'grid',
            'grid' => 'index',
            'datasource' => 'collection',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
$layouts['exception'] = array(
    'type' => 'exception',
    'views' => array(
        'body' => array(
            'type' => 'exception',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
