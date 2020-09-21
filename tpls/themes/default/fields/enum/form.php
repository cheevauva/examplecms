<select name="form[<?= $token; ?>][<?= $name; ?>]" id="<?= $name; ?>">
    <?php foreach ($options as $value => $label) : ?>
        <option value="<?= htmlspecialchars($value); ?>">
            <?= htmlspecialchars($label); ?>
        </option>
    <?php endforeach; ?>
</select>
