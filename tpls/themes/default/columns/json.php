<?php

return function ($metadata) {
    $fields = array();

    foreach ($metadata['fields'] as $name => $field) {
        $fields[$name] = json_decode($json = $field->getContent(), true);
    }
    
    echo json_encode(array(
        'fields' => $fields
    ));
};
