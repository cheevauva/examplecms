<?php

return function ($medadata) {
    header('Content-Type: application/json', true);

    echo json_encode($medadata);
};
