<?php

$grids['read'] = array(
    'datasource' => 'context-model',
    'type' => 'table',
    'rows' => array(
        array(
            'type' => 'default',
            'class' => '',
            'iterate' => true,
            'columns' => array(
                'name_label',
                'name',
            ),
        ),
    ),
);
$grids['json-index'] = array(
    'type' => 'basic',
    'template' => 'json',
    'rows' => array(
        array(
            'type' => 'default',
            'template' => 'json',
            'iterate' => true,
            'class' => '',
            'columns' => array(
                array(
                    'type' => 'default',
                    'template' => 'json',
                    'fields' => array(
                        array(
                            'name' => 'id',
                            'type' => 'link',
                            'template' => 'json',
                            'route' => 'read',
                        ),
                    ),
                ),
                array(
                    'type' => 'default',
                    'template' => 'json',
                    'fields' => array(
                        array(
                            'name' => 'name',
                            'template' => 'json',
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
$grids['index'] = array(
    'datasource' => 'collection',
    'type' => 'table',
    'view' => 'view',
    'rows' => array(
        array(
            'type' => 'default',
            'class' => '',
            'columns' => array(
                'name_label',
                'actions_label'
            ),
        ),
        array(
            'type' => 'default',
            'iterate' => true,
            'class' => '',
            'columns' => array(
                'name',
                'actions'
            ),
        ),
    ),
);
$grids['edit'] = array(
    'type' => 'table',
    'datasource' => 'context-model',
    'rows' => array(),
);
$grids['form'] = array(
    'type' => 'table',
    'datasource' => 'context-model',
);

