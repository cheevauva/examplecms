<?php

foreach (array(
    'modules.base' => 'ExampleCMS\Module',
    'themes.default' => 'ExampleCMS\Application\Theme\Basic',
) as $name => $value) {
    $components[$name] = $value;
}
