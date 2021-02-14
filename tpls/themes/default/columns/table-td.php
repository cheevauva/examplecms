<td colspan="<?= $colspan; ?>">
    <?php foreach ($fields as $field) : ?>
        <?= $this($field); ?>
    <?php endforeach; ?>
</td>