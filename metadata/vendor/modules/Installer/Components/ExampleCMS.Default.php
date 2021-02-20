<?php

$components['queries.find'] = ExampleCMS\Module\Configuration\Query\Find::class;
$components['actions.save'] = ExampleCMS\Module\Installer\Action\Update::class;
$components['actions.index'] = ExampleCMS\Module\Installer\Action\Index::class;
$components['actions.read'] = ExampleCMS\Module\Installer\Action\Read::class;
$components['queries.save'] = ExampleCMS\Module\Installer\Query\Save::class;
$components['queries.save-relation'] = ExampleCMS\Module\Installer\Query\SaveRelation::class;
$components['queries.find'] = ExampleCMS\Module\Installer\Query\Find::class;
$components['queries.find-in-context'] = ExampleCMS\Module\Installer\Query\FindInContext::class;
$components['queries.findCollection'] = ExampleCMS\Module\Installer\Query\FindCollection::class;
$components['field.text-from-fs'] = ExampleCMS\Module\Installer\Responder\FieldTextFromFilesystem::class;
$components['view.list'] = ExampleCMS\Application\Responder\ViewList::class;
$components['entity.license'] = ExampleCMS\Module\Installer\Entity\EntityLicense::class;
