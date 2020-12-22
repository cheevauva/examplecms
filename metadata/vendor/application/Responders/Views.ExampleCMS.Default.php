<?php

$views['exception'] = array(
    'component' => 'exception',
);
$views['header'] = array(
    'component' => 'header',
);
$views['footer'] = array(
    'component' => 'basic',
    'template' => 'footer',
);
$views['asset'] = array(
    'component' => 'asset',
);
$views['json-index'] = array(
    'component' => 'grid',
    'grid' => 'json-index',
    'datasource' => 'collection',
);
$views['json-read'] = array(
    'component' => 'grid',
    'grid' => 'json-read',
    'datasource' => 'collection',
);
$views['json-designer'] = array(
    'component' => 'designer',
    'template' => 'designer-json',
);
$views['json-exception'] = array(
    'component' => 'exception',
    'template' => 'exception-json',
);
