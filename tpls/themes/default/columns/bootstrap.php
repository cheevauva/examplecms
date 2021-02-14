<?php $colspan = $extra['colspan'] ?? 0; ?>
<?php $floating = $extra['floating'] ?? false; ?>
<div class="<?php if ($colspan): ?>col-md-<?= $colspan; ?><?php endif; ?>">
    <?php if (!empty($floating)): ?>
        <?php if (!empty($fields[1]) && $fields[1]['templateName'] === 'label' && count($fields) === 2): ?>
            <div class="form-floating">
                <?= $this($fields[0]); ?>
                <?= $this($fields[1]); ?>
            </div>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                The column is declared as floating, but the structure of the fields is not floating 
            </div>
        <?php endif; ?>
    <?php else: ?>
        <?php foreach ($fields as $field) : ?>
            <?= $this($field); ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
