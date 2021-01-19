<?php

$components['queries.find'] = ExampleCMS\Module\Configuration\Query\Find::class;
$components['actions.save'] = ExampleCMS\Module\Installer\Action\Update::class;
$components['actions.index'] = ExampleCMS\Module\Installer\Action\Index::class;
$components['actions.read'] = ExampleCMS\Module\Installer\Action\Read::class;
$components['queries.save'] = ExampleCMS\Module\Installer\Query\Save::class;
$components['queries.find'] = ExampleCMS\Module\Installer\Query\Find::class;
$components['queries.findFormModel'] = ExampleCMS\Module\Installer\Query\FindFormModel::class;
$components['queries.findCollection'] = ExampleCMS\Module\Installer\Query\FindCollection::class;
$components['field.text-from-fs'] = ExampleCMS\Module\Installer\Responder\FieldTextFromFilesystem::class;
