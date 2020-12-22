<?php

$grids['language'] = array(
    'datasource' => 'installer-model',
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
                            'label' => 'language',
                        ),
                    )
                ),
                array(
                    'component' => 'default',
                    'fields' => array(
                        array(
                            'component' => 'enum',
                            'name' => 'language',
                            'default' => 'en_US',
                            'template' => 'form',
                            'options' => 'languages',
                        ),
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

