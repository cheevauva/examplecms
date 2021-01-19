<?php

$grid['read'] = array(
    'component' => 'table',
    'rows' => array(
        array(
            'component' => 'default',
            'class' => '',
            'iterate' => true,
            'columns' => array(
                'name_label',
                'name',
            ),
        ),
    ),
);
$grid['json-index'] = array(
    'component' => 'basic',
    'template' => 'json',
    'rows' => array(
        array(
            'component' => 'default',
            'template' => 'json',
            'iterate' => true,
            'class' => '',
            'columns' => array(
                array(
                    'component' => 'default',
                    'template' => 'json',
                    'fields' => array(
                        array(
                            'name' => 'id',
                            'component' => 'link',
                            'template' => 'json',
                            'route' => 'read',
                        ),
                    ),
                ),
                array(
                    'component' => 'default',
                    'template' => 'json',
                    'fields' => array(
                        array(
                            'name' => 'name',
                            'template' => 'json',
                            'component' => 'string',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
$grid['index'] = array(
    'component' => 'table',
    'view' => 'view',
    'rows' => array(
        array(
            'component' => 'default',
            'class' => '',
            'columns' => array(
                'name_label',
                'actions_label'
            ),
        ),
        array(
            'component' => 'default',
            'iterate' => true,
            'class' => '',
            'columns' => array(
                'name',
                'actions'
            ),
        ),
    ),
);
$grid['edit'] = array(
    'component' => 'table',
    'rows' => array(),
);
$grid['form'] = array(
    'component' => 'table',
);

