<?php

return function ($metadata) {
    $columns = array();

    foreach ($metadata['columns'] as $key => $column) {
        $columns[$key] = json_decode($column->getContent());
    }

    echo json_encode(array(
        'columns' => $columns
    ));
};
