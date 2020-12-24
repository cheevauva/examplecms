<div class="footer">
    <p>
        <br/><br/>
        &copy; by chee.<br/>
        Execute time: <?= microtime(true) - $GLOBALS['EXAMPLECMS_TIMESTART']; ?>
        <br/>
        Memory usage: <?= (memory_get_peak_usage() / (1024 * 1024)); ?>
        <br/>
        Include files: <?= count(get_included_files()); ?>

    </p>
    <?php if (0): ?>
        <pre><?= print_r(get_included_files(), 1); ?></pre>
    <?php endif; ?>
</div>
