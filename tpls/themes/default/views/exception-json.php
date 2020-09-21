<?php

return function ($template, $data) {
    header('Content-Type: application/json');

    echo json_encode(array(
        'error' => 'todo',
    ));
};
