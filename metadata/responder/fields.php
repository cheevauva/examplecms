<?php

return array(
    'grids.read' => array(
        'type' => 'table',
        'view' => 'view',
        'rows' => array(
            array(
                'type' => 'default',
                'columns' => array(
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'label',
                                'label' => 'name',
                            ),
                        ),
                    ),
                    array(
                        'type' => 'default',
                        'fields' => array(
                            'name',
                        ),
                    ),
                ),
            ),
            array(
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
                            'module',
                        ),
                    ),
                ),
            ),
            array(
                'type' => 'default',
                'columns' => array(
                    array(
                        'type' => 'default',
                        'field' => array(
                            'type' => 'label',
                            'label' => 'type',
                        ),
                    ),
                    array(
                        'type' => 'default',
                        'field' => 'type',
                    ),
                ),
            ),
        ),
    ),
    'grids.index' => array(
        'type' => 'default',
        'view' => 'view',
        'class' => 'table table-bordered',
        'rows' => array(
            array(
                'iterate' => false,
                'class' => '',
                'type' => 'default',
                'columns' => array(
                    array(
                        'type' => 'header',
                        'fields' => array(
                            array(
                                'type' => 'label',
                                'label' => 'name',
                            ),
                        ),
                    ),
                    array(
                        'type' => 'header',
                        'fields' => array(
                            array(
                                'type' => 'label',
                                'label' => 'module',
                            ),
                        ),
                    ),
                    array(
                        'type' => 'header',
                        'fields' => array(
                            array(
                                'type' => 'label',
                                'label' => 'type',
                            ),
                        ),
                    ),
                ),
            ),
            array(
                'iterate' => true,
                'class' => '',
                'type' => 'default',
                'columns' => array(
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'name' => 'name',
                                'type' => 'link',
                                'route' => 'read',
                                'use_label' => false,
                            ),
                        ),
                    ),
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'string',
                                'label' => 'label',
                                'name' => 'module',
                            ),
                        ),
                    ),
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'string',
                                'label' => 'label',
                                'name' => 'type',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
