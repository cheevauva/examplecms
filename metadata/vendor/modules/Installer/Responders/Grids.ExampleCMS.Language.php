<?php

$grids['language'] = array(
    'datasource' => 'installer-model',
    'name' => 'language',
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
                            'label' => 'language',
                        ),
                    )
                ),
                array(
                    'type' => 'default',
                    'fields' => array(
                        array(
                            'type' => 'enum',
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
);

