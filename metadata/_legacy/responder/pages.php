<?php

return array(
    'grids.edit' => array(
        'type' => 'table',
        'datasource' => 'context-model',
        'rows' => array(
            array(
                'type' => 'default',
                'columns' => array(
                    'type' => 'default',
                    'fields' => array(
                        array(
                            'type' => 'string',
                            'name' => 'name',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
