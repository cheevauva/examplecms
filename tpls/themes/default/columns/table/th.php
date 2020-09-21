<?php return function ($column) { ?>
    <th colspan="<?= $column['colspan']; ?>">
        <?= $column['field']->render(); ?>
        <?= $column['grid']->render(); ?>
    </th>>
<?php } ?>
