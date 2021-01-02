<th colspan="<?= $colspan; ?>">
    <?php foreach ($fields as $field) : ?>
        <?= $this->render($field); ?>
    <?php endforeach; ?>
</th>
