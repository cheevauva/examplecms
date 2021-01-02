<td colspan="<?= $colspan; ?>">
    <?php foreach ($fields as $field) : ?>
        <?= $this->render($field); ?>
    <?php endforeach; ?>
</td>

