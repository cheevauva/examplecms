<?php

$components['actions.redirect'] = ExampleCMS\Application\Action\Redirect::class;
$components['actions.redirect-when-valid-entity'] = ExampleCMS\Application\Action\RedirectWhenValidEntity::class;
$components['actions.redirect-when-invalid-entity'] = ExampleCMS\Application\Action\RedirectWhenInvalidEntity::class;
$components['actions.save'] = ExampleCMS\Application\Action\CRUDUpdate::class;
$components['actions.index'] = ExampleCMS\Application\Action\CRUDIndex::class;
$components['actions.read'] = ExampleCMS\Application\Action\CRUDRead::class;