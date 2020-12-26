<?php

$layouts['edit'] = array(
    'component' => 'basic',
    'views' => array(
        'header' => 'header',
        'body' => array(
            'component' => 'grid',
            'grid' => 'edit',
            'route' => 'do_create',
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
$layouts['json-exception'] = array(
    'component' => 'json-exception',
    'views' => array(
        'body' => array(
            'component' => 'exception',
        ),
    ),
);
$layouts['json'] = array(
    'component' => 'json',
    'views' => array(
        'body' => array(
            'component' => 'json',
        ),
    ),
);
