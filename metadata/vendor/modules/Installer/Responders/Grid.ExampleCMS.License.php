<?php

$grid['license'] = array(
    'name' => 'license',
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
                            'label' => 'license_text',
                        ),
                    )
                ),
                array(
                    'component' => 'default',
                    'fields' => array(
                        array(
                            'component' => 'text-from-fs',
                            'name' => 'license',
                            'template' => 'view-raw',
                            'value' => 'LICENSE',
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
                            'label' => 'license_is_accept',
                        ),
                    )
                ),
                array(
                    'component' => 'default',
                    'fields' => array(
                        array(
                            'component' => 'bool',
                            'name' => 'accept',
                            'template' => 'form',
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

