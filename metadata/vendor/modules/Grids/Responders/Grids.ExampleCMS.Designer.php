<?php

$grids['index'] = array(
    'type' => 'table',
    'view' => 'view',
    'rows' => array(
        array(
            'type' => 'default',
            'class' => '',
            'columns' => array(
                array(
                    'type' => 'header',
                    'fields' => array(
                        array(
                            'type' => 'label',
                            'label' => 'id',
                        ),
                    ),
                ),
                array(
                    'type' => 'header',
                    'fields' => array(
                        array(
                            'type' => 'label',
                            'label' => 'actions',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'type' => 'default',
            'iterate' => true,
            'class' => '',
            'columns' => array(
                array(
                    'type' => 'default',
                    'fields' => array(
                        array(
                            'name' => 'id',
                            'type' => 'link',
                            'route' => 'grid_designer',
                        ),
                    ),
                ),
                array(
                    'type' => 'default',
                    'fields' => array(
                        array(
                            'type' => 'link',
                            'label' => 'label',
                            'route' => 'read',
                            'use_label' => true,
                            'name' => 'Read',
                        ),
                        array(
                            'type' => 'link',
                            'label' => 'label',
                            'name' => 'Edit',
                            'route' => 'edit',
                            'use_label' => true,
                        ),
                    ),
                ),
            ),
        ),
    ),
);
$grids['designer'] = array(
    'type' => 'table',
    'rows' => array(),
);
$grids['form'] = array(
    'type' => 'table',
    'rows' => array(
        array(
            'iterate' => true,
            'type' => 'default',
            'columns' => array(
                array(
                    'type' => 'default',
                    'fields' => array(
                        array(
                            'type' => 'label',
                            'label' => 'module',
                        ),
                    ),
                ),
                array(
                    'type' => 'default',
                    'fields' => array(
                        array(
                            'view' => 'form',
                            'type' => 'string',
                            'name' => 'module',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'type' => 'default',
            'iterate' => true,
            'columns' => array(
                array(
                    'type' => 'default',
                    'fields' => array(
                        array(
                            'type' => 'label',
                            'label' => 'grid',
                        ),
                    ),
                ),
                array(
                    'type' => 'default',
                    'fields' => array(
                        array(
                            'view' => 'form',
                            'type' => 'string',
                            'name' => 'grid',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'type' => 'default',
            'columns' => array(
                array(
                    'colspan' => 2,
                    'type' => 'default',
                    'fields' => array(
                        array(
                            'type' => 'button',
                            'label' => 'Create',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
