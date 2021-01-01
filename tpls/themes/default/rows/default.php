<tr>
    <?php foreach ($columns as $column) : ?>
        <?= $this->render($column); ?>
    <?php endforeach; ?>
</tr>
