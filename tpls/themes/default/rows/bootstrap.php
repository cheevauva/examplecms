<div class="row g-3">
    <?php foreach ($columns as $column) : ?>
        <?= $this($column); ?>
    <?php endforeach; ?>
</div>
