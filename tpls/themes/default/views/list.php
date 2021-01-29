<table class="table table-bordered">
    <?php foreach ($entities as $entity) : ?>
    <?php endforeach; ?>
    <?php if (empty($entities)) : ?>
        <tr>
            <td colspan="555">
                No items
            </td>
        </tr>
    <?php endif; ?>
</table>