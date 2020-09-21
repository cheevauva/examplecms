<tr>
    <?php foreach ($columns as $column) : ?>
        <?= $theme->make($column); ?>
    <?php endforeach; ?>
</tr>
