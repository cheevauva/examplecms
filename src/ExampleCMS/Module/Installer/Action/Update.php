<?php

namespace ExampleCMS\Module\Installer\Action;

class Update extends \ExampleCMS\Application\Action\Action
{

    public function execute($request)
    {
        $query = $this->module->query('findFormModel');

        $formModel = $query->fetch([
            $query::REQUEST => $request
        ]);

        $model = $this->module->query('find')->execute();
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
