<select name="form[<?= $token; ?>][<?= $name; ?>]" id="<?= $name; ?>">
    <?php foreach ($_[$options] as $value => $label) : ?>
        <option value="<?= htmlspecialchars($value); ?>">
            <?= htmlspecialchars($label); ?>
        </option>
    <?php endforeach; ?>
</select>
