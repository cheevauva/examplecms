<?php

return array(
    'layouts.edit' => array(
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
    ),
    'layouts.create' => array(
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
    ),
    'layouts.update' => array(
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
    ),

    'layouts.read' => array(
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
    ),
    'layouts.index' => array(
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
    ),
    'layouts.exception' => array(
        'type' => 'exception',
        'views' => array(
            'body' => array(
                'type' => 'exception',
            ),
            'footer' => 'footer',
            'asset' => 'asset',
        ),
    ),
    'views.exception' => array(
        'type' => 'exception',
    ),
    'layouts.rest' => array(
        'type' => 'rest',
    ),
    'views.header' => array(
        'type' => 'header',
    ),
    'views.footer' => array(
        'type' => 'basic',
        'template' => 'footer',
    ),
    'views.asset' => array(
        'type' => 'asset',
    ),
    'views.json-index' => array(
        'type' => 'grid',
        'grid' => 'json-index',
        'datasource' => 'collection',
    ),
    'views.json-read' => array(
        'type' => 'grid',
        'grid' => 'json-read',
        'datasource' => 'collection',
    ),
    'views.json-designer' => array(
        'type' => 'designer',
        'template' => 'designer-json',
    ),
    'views.json-exception' => array(
        'type' => 'exception',
        'template' => 'exception-json',
    ),
    'grids.read' => array(
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
    ),
    'grids.json-index' => array(
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
    ),
    'grids.index' => array(
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
    ),
    'columns.name_label' => array(
        'type' => 'header',
        'fields' => array(
            array(
                'type' => 'label',
                'label' => 'name',
            ),
        ),
    ),
    'columns.name' => array(
        'type' => 'default',
        'fields' => array(
            'name',
        ),
    ),
    'columns.actions_label' => array(
        'type' => 'default',
        'fields' => array(
            array(
                'type' => 'label',
                'label' => 'actions',
            ),
        ),
    ),
    'columns.actions' => array(
        'type' => 'default',
        'fields' => array(
            'action_edit',
            'action_read',
        ),
    ),
    'fields.name' => array(
        'name' => 'name',
        'type' => 'link',
        'route' => 'read',
        'use_label' => false,
    ),
    'fields.action_edit' => array(
        'type' => 'link',
        'label' => 'edit',
        'route' => 'edit',
        'use_label' => true,
        'name' => 'Edit',
    ),
    'fields.action_read' => array(
        'type' => 'link',
        'label' => 'read',
        'route' => 'read',
        'use_label' => true,
        'name' => 'Read',
    ),
    'grids.edit' => array(
        'type' => 'table',
        'datasource' => 'context-model',
        'rows' => array(),
    ),
    'grids.form' => array(
        'type' => 'table',
        'datasource' => 'context-model',
    ),
);
