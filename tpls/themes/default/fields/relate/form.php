<?php return function ($model, $field) { ?>
    <div class="form-group">
        <input class="form-control" name="<?= $field->get('name'); ?>" type="text" value="<?= $model->get($field->get('name')); ?>"/>
    </div>
<?php } ?>
