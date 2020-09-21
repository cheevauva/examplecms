<?= $this->form->getOpenTag();?>
<?php foreach ($this->form->getElements() as $field): ?>
<?php if ($field->getAttribute('hidden')) : ?>
<?= $field->render(); ?>
<?php else :?>
    <div class="form-group">
        <?= $field->render(); ?>
    </div>
<?php endif;?>
<?php endforeach; ?>
<?= $this->form->getCloseTag();?>
<script type="text/javascript">
    require(['examplecms/form']);
</script>