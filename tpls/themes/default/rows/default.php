<tr>
    <?php foreach ($columns as $column) : ?>
        <?= $this($column); ?>
    <?php endforeach; ?>
</tr>
