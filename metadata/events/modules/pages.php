<?php

return array(
    'beforeSave' => array(
        'object' => 'Module\Category\EventHandler\Generic',
        'method' => 'createIfNotExist',
    ),
);
