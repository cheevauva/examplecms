<td colspan="<?= $colspan ?? 0; ?>">
    <?php foreach ($fields as $field) : ?>
        <?= $this($field); ?>
    <?php endforeach; ?>
</td>