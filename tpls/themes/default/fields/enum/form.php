<select name="<?= $formName; ?>[<?= $name; ?>]" id="<?= $name; ?>"  class="form-select">
    <?php foreach ($_[$options] as $key => $label) : ?>
        
        <option <?php if ($key === $value): ?>selected="selected"<?php endif; ?> value="<?= $key; ?>">
            <?= htmlspecialchars($label); ?>
        </option>
    <?php endforeach; ?>
</select>
