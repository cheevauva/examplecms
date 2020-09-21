<?php return function ($model, $field) { ?>
    <div class="form-group">
        <textarea name="<?= $field->get('name'); ?>" class="form-control" rows="3"><?= $model->get($field->get('name')); ?></textarea>
    </div>
<?php }; ?>