<?php
$metrics = [
    'execute_time' => microtime(true) - $examplecms_timestart,
    'memory' => memory_get_peak_usage() / (1024 * 1024),
    'include_files' => count(get_included_files()),
];
?>
<div class="footer">
    <p>
        &copy; <span class="examplecms_metrics" data-metrics="<?= $e(json_encode($metrics)); ?>" onclick="alert(this.dataset.metrics);">ExampleCMS</span>
    </p>
    <?php if (0): ?>
        <pre><?= print_r(get_included_files(), 1); ?></pre>
        <pre><?= print_r($this->assets, 1); ?></pre>
        <pre><?= print_r(array_keys($this->templates), 1); ?></pre>
    <?php endif; ?>
</div>
