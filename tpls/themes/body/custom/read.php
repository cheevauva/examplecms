<?php $this->layout('layout', array('view' => $view)); ?>
<?php $this->start('body'); ?>
<h2><?= $model->get('name'); ?></h2>
<table class="table table-bordered">
<?php foreach ($card->getFields() as $field) :?>
    <tr>
        <td width="30%"><?= $field->asLabel();?></td>
        <td><?= $field->asReadField($model);?></td>
    </tr>
<?php endforeach; ?>
</table>
<?php 
echo $this->insert('body/form', array(
    'card' => $commentCard,
    'view' => $view,
    'model' => $commentModel,
    'noBlock' => true,
));
?>
<?php $this->stop();?>