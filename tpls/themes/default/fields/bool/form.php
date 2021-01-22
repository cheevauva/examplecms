<input name="<?= $name; ?>" type="hidden" value="0"/>
<input <?php if (!empty($value)) : ?>checked<?php endif; ?>  name="<?= $formName;?>[<?= $name; ?>]" type="checkbox" value="1" />