<?php

return array(
    'layouts.empty' => array(
        'type' => 'basic',
        'template' => 'empty',
        'views' => array(
        ),
    ),
    'layouts.setup' => array(
        'type' => 'basic',
        'template' => 'setup',
        'views' => array(
            'body' => array(
                'type' => 'form',
                'grid' => 'form',
                'module' => 'installer',
                'form' => 'edit',
            ),
            'footer' => 'footer',
            'asset' => 'asset',
        ),
    ),
    'grids.mysql' => array(
        'name' => 'mysql',
        'type' => 'form',
        'rows' => array(
            array(
                'type' => 'default',
                'columns' => array(
                    array(
                        'type' => 'default',
                        'colspan' => '2',
                        'fields' => array(
                            array(
                                'type' => 'label',
                                'label' => 'mysql_settings',
                            ),
                        )
                    ),
                )
            ),
            array(
                'type' => 'default',
                'columns' => array(
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'label',
                                'label' => 'mysql_host',
                            ),
                        )
                    ),
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'string',
                                'name' => 'mysql_host',
                                'default' => 'localhost',
                                'template' => 'form',
                            ),
                        )
                    ),
                )
            ),
            array(
                'type' => 'default',
                'columns' => array(
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'label',
                                'label' => 'mysql_username',
                            ),
                        )
                    ),
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'string',
                                'name' => 'mysql_username',
                                'default' => 'root',
                                'template' => 'form',
                            ),
                        )
                    ),
                )
            ),
            array(
                'type' => 'default',
                'columns' => array(
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'label',
                                'label' => 'mysql_password',
                            ),
                        )
                    ),
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'string',
                                'name' => 'mysql_password',
                                'template' => 'form',
                            ),
                        )
                    ),
                )
            ),
            array(
                'type' => 'default',
                'columns' => array(
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'label',
                                'label' => 'mysql_database',
                            ),
                        )
                    ),
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'string',
                                'name' => 'mysql_database',
                                'template' => 'form',
                            ),
                        )
                    ),
                )
            ),
        ),
    ),
    'grids.sqlite' => array(
        'name' => 'sqlite',
        'type' => 'form',
        'rows' => array(
            array(
                'type' => 'default',
                'columns' => array(
                    array(
                        'type' => 'default',
                        'colspan' => '2',
                        'fields' => array(
                            array(
                                'type' => 'label',
                                'label' => 'sqlite_settings',
                            ),
                        )
                    ),
                )
            ),
            array(
                'type' => 'default',
                'columns' => array(
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'label',
                                'label' => 'sqlite_filename',
                            ),
                        )
                    ),
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'string',
                                'name' => 'sqlite_filename',
                                'default' => 'cache/db',
                                'template' => 'form',
                            ),
                        )
                    ),
                )
            ),
        ),
    ),
    'grids.form' => array(
        'name' => 'form',
        'type' => 'form',
        'rows' => array(
            array(
                'type' => 'default',
                'columns' => array(
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'label',
                                'label' => 'sql_engine',
                            ),
                        )
                    ),
                    array(
                        'type' => 'default',
                        'fields' => array(
                            array(
                                'type' => 'enum',
                                'name' => 'sql_engine',
                                'default' => 'sqlite',
                                'template' => 'form',
                                'options' => array(
                                    'sqlite' => 'SQLite',
                                    'mysql' => 'MySQL',
                                )
                            ),
                            array(
                                'type' => 'grid',
                                'grid' => 'mysql',
                            ),
                            array(
                                'type' => 'grid',
                                'grid' => 'sqlite',
                            ),
                        )
                    ),
                )
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
                                'label' => 'send',
                            ),
                        )
                    ),
                )
            ),
        ),
    ),
);

