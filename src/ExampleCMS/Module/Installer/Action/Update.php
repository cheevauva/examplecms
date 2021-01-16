<?php

namespace ExampleCMS\Module\Installer\Action;

class Update extends \ExampleCMS\Application\Action\Action
{

    public function execute($request)
    {
        /* @var $query \ExampleCMS\Module\Installer\Query\FindFormModel */
        $query = $this->module->query('findFormModel');

        $formModel = $query->fetch([
            $query::REQUEST => $request,
            $query::FORM => $this->metadata['form'],
        ]);

        $model = $this->module->query('find')->fetch();
        $formModel->bindTo($model);

        $save = $this->module->query('save');
        $save->execute([
            $save::MODEL => $model,
        ]);

        $session = $request->getAttribute('session');
        $session->set('language', $model->get('language_installer'));

        return $request;
    }

}
