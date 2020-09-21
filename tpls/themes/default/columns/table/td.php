<?php return function ($column) { ?>
    <td colspan="<?= $column['colspan']; ?>">
        <?= $column['field']->render(); ?>
        <?= $column['grid']->render(); ?>
    </td>
<?php } ?>
