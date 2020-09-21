<?php

return array(
    'edit' => array(
        'method' => 'GET',
        'route' => '*',
        'target' => array(
            'module' => 'installer',
            'id' => 'setup',
            'operation' => 'edit',
            'view' => 'form',
            'form' => 'edit',
            'layout' => 'setup',
            'action' => 'save',
        ),
    ),
);
