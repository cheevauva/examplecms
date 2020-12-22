<select name="<?= $formName; ?>[<?= $name; ?>]" id="<?= $name; ?>">
    <?php foreach ($_[$options] as $key => $label) : ?>
        <?php $selected = ($key === $value) ? 'selected' : ''; ?>
        <option value="<?= $key; ?>" selected="<?= $selected; ?>">
            <?= htmlspecialchars($label); ?>
        </option>
    <?php endforeach; ?>
</select>
