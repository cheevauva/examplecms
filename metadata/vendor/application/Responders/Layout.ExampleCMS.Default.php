<?php

$layout['edit'] = array(
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
$layout['rest'] = array(
    'component' => 'rest',
);
$layout['create'] = array(
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
$layout['update'] = array(
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
$layout['read'] = array(
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
$layout['index'] = array(
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
$layout['exception'] = array(
    'component' => 'exception',
    'views' => array(
        'body' => array(
            'component' => 'exception',
        ),
        'footer' => 'footer',
        'asset' => 'asset',
    ),
);
$layout['json-exception'] = array(
    'component' => 'json-exception',
    'views' => array(
        'body' => array(
            'component' => 'exception',
        ),
    ),
);
$layout['json'] = array(
    'component' => 'json',
    'views' => array(
        'body' => array(
            'component' => 'json',
        ),
    ),
);
