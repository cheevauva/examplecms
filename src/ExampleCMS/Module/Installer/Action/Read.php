<?php

namespace ExampleCMS\Module\Installer\Action;

class Read extends \ExampleCMS\Application\Action\Action
{

    public function execute($request)
    {
        $formModels = $this->formManager->getFormModelsByRequest($request);
        $formModel = reset($formModels);

        $find = $this->module->query('find');
        $model = $find->execute([
            $find::REQUEST => $request,
        ]);

        $formModel->bindFrom($model);

        return $request->withAttribute('model', $formModel);
    }

}
