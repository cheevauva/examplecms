<td colspan="<?= $colspan; ?>">
    <?php foreach ($fields as $field) : ?>
        <?= $theme->make($field); ?>
    <?php endforeach; ?>
</td>

