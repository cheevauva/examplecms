<?php $class = ''; ?>
<?php if (!empty($extra['as-button'])): ?>
    <?php $class .= 'btn btn-primary'; ?>
<?php endif; ?>
<a class="<?= $class; ?> " href="<?php echo $router($route); ?>">
    <?= $e($_[$label]); ?>
</a>