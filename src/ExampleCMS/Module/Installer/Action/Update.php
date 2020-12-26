<?php

namespace ExampleCMS\Module\Installer\Action;

class Update extends \ExampleCMS\Application\Action\Action
{

    /**
     * @var \ExampleCMS\FormManager
     */
    public $formManager;

    public function execute($request)
    {
        $formModels = $this->formManager->getFormModelsByRequest($request);
        $formModel = reset($formModels);

        if (!$formModel->isValid()) {
            return $request;
        }

        $model = null;

        $find = $this->module->query('find');
        $model = $find->execute([
            $find::REQUEST => $request,
        ]);

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
