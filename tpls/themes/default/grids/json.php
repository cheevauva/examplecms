<?php

return function ($metadata) {
    $rows = array();

    foreach ($metadata['rows'] as $name => $row) {
        $rows[$name] = json_decode($json = $row->getContent(), true);
    }
    header('Content-Type: application/json');
    echo json_encode(array(
        'rows' => $rows
    ));
};


