<?php

$grid['language'] = array(
    'name' => 'language',
    'component' => 'form',
    'rows' => array(
        array(
            'component' => 'default',
            'columns' => array(
                array(
                    'component' => 'default',
                    'fields' => array(
                        array(
                            'component' => 'label',
                            'label' => 'language_installer',
                        ),
                    )
                ),
                array(
                    'component' => 'default',
                    'fields' => array(
                        array(
                            'component' => 'enum',
                            'name' => 'installer',
                            'default' => 'en_US',
                            'template' => 'form',
                            'options' => 'languages',
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
                            'component' => 'label',
                            'label' => 'language_system',
                        ),
                    )
                ),
                array(
                    'component' => 'default',
                    'fields' => array(
                        array(
                            'component' => 'enum',
                            'name' => 'system',
                            'default' => 'en_US',
                            'template' => 'form',
                            'options' => 'languages',
                        ),
                    )
                ),
            ),
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

