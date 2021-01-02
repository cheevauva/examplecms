<?php

namespace ExampleCMS\Module\Installer\Action;

class Update extends \ExampleCMS\Application\Action\Action
{

    public function execute($request)
    {
        $formModel = null;
        $model = null;
        
        $query = $this->module->query('findFormModel');
        $formModel = $query->fetch([
            $query::REQUEST => $request,
            $query::FORM => $request->getAttribute('form'),
        ]);

        $model = $this->module->query('find')->execute();

        $formModel->bindTo($model);

        $save = $this->module->query('save');
        $save->execute([
            $save::MODEL => $model,
        ]);

        $session = $request->getAttribute('session');
        $session->set('language', $model->get('language_installer'));

        return $request->withAttribute('model', $model);
    }

}
