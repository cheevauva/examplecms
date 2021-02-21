<table class="table">
    <tbody>
        <?php foreach ($rows as $row) : ?>
            <?php echo $this($row); ?>
        <?php endforeach; ?>
        <?php if (empty($rows)) : ?>
            <tr>
                <td colspan="555">
                    No items
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>