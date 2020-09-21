<?php return function ($template, $metadata) { ?>

    <?php header('Content-Type: application/json');
    ;
    echo json_encode($metadata); ?>
<?php } ?>