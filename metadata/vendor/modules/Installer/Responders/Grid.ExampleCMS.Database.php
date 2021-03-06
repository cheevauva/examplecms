<?php

$grid['mysql'] = array(
    'name' => 'mysql',
    'component' => 'form',
    'rows' => array(
        array(
            'component' => 'default',
            'columns' => array(
                array(
                    'component' => 'default',
                    'colspan' => '2',
                    'fields' => array(
                        array(
                            'component' => 'label',
                            'label' => 'mysql_settings',
                        ),
                    )
                ),
            )
        ),
        array(
            'component' => 'default',
            'columns' => array(
                array(
                    'component' => 'default',
                    'extra' => [
                        'floating' => true,
                        'colspan' => 6,
                    ],
                    'fields' => array(
                        array(
                            'component' => 'string',
                            'name' => 'mysql_host',
                            'default' => 'localhost',
                            'template' => 'form',
                        ),
                        array(
                            'component' => 'label',
                            'label' => 'mysql_host',
                        ),
                    )
                ),
                array(
                    'component' => 'default',
                    'extra' => [
                        'floating' => true,
                        'colspan' => 6,
                    ],
                    'fields' => array(
                        array(
                            'component' => 'string',
                            'name' => 'mysql_database',
                            'template' => 'form',
                        ),
                        array(
                            'component' => 'label',
                            'label' => 'mysql_database',
                        ),
                    )
                ),
                array(
                    'component' => 'default',
                    'extra' => [
                        'floating' => true,
                        'colspan' => 6,
                    ],
                    'fields' => array(
                        array(
                            'component' => 'string',
                            'name' => 'mysql_username',
                            'default' => 'root',
                            'template' => 'form',
                        ),
                        array(
                            'component' => 'label',
                            'label' => 'mysql_username',
                        ),
                    )
                ),
                array(
                    'component' => 'default',
                    'extra' => [
                        'floating' => true,
                        'colspan' => 6,
                    ],
                    'fields' => array(
                        array(
                            'component' => 'string',
                            'name' => 'mysql_password',
                            'template' => 'form',
                        ),
                        array(
                            'component' => 'label',
                            'label' => 'mysql_password',
                        ),
                    )
                ),
            )
        ),
    ),
);

$grid['sqlite'] = array(
    'name' => 'sqlite',
    'component' => 'form',
    'rows' => array(
        array(
            'component' => 'default',
            'columns' => array(
                array(
                    'component' => 'default',
                    'colspan' => '2',
                    'fields' => array(
                        array(
                            'component' => 'label',
                            'label' => 'sqlite_settings',
                        ),
                    )
                ),
            )
        ),
        array(
            'component' => 'default',
            'columns' => array(
                array(
                    'component' => 'default',
                    'extra' => [
                        'floating' => true,
                        'colspan' => 12,
                    ],
                    'fields' => array(
                        array(
                            'component' => 'string',
                            'name' => 'sqlite_filename',
                            'default' => 'cache/db',
                            'template' => 'form',
                        ), array(
                            'component' => 'label',
                            'label' => 'sqlite_filename',
                        ),
                    )
                ),
            )
        ),
    ),
);

$grid['database'] = array(
    'name' => 'form',
    'component' => 'form',
    'rows' => array(
        array(
            'component' => 'default',
            'columns' => array(
                array(
                    'component' => 'default',
                    'extra' => [
                        'floating' => true,
                        'colspan' => 12,
                    ],
                    'fields' => array(
                        array(
                            'component' => 'enum',
                            'name' => 'sql_engine',
                            'default' => 'sqlite',
                            'template' => 'form',
                            'options' => 'sql_engines',
                        ),
                        array(
                            'component' => 'label',
                            'label' => 'sql_engine',
                        ),
                    )
                ),
            ),
        ),
        array(
            'component' => 'default',
            'columns' => array(
                array(
                    'component' => 'default',
                    'fields' => array(
                        array(
                            'component' => 'grid',
                            'grid' => 'mysql',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'component' => 'default',
            'columns' => array(
                array(
                    'component' => 'default',
                    'fields' => array(
                        array(
                            'component' => 'grid',
                            'grid' => 'sqlite',
                        )
                    )
                ),
            )
        ),
        array(
            'component' => 'default',
            'columns' => array(
                array(
                    'colspan' => 2,
                    'component' => 'default',
                    'fields' => array(
                        array(
                            'component' => 'button',
                            'label' => 'send',
                        ),
                    )
                ),
            )
        ),
    ),
);
