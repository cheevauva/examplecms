<?php

$views['exception'] = array(
    'type' => 'exception',
);
$views['header'] = array(
    'type' => 'header',
);
$views['footer'] = array(
    'type' => 'basic',
    'template' => 'footer',
);
$views['asset'] = array(
    'type' => 'asset',
);
$views['json-index'] = array(
    'type' => 'grid',
    'grid' => 'json-index',
    'datasource' => 'collection',
);
$views['json-read'] = array(
    'type' => 'grid',
    'grid' => 'json-read',
    'datasource' => 'collection',
);
$views['json-designer'] = array(
    'type' => 'designer',
    'template' => 'designer-json',
);
$views['json-exception'] = array(
    'type' => 'exception',
    'template' => 'exception-json',
);
