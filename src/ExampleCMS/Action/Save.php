<?php

namespace ExampleCMS\Action;

class Save extends Action
{

    public function execute()
    {
        $form = $this->context->getForm();

        if ($form->isValid()) {
            return;
        }

        $model = $this->context->getModel();
        $model->fromArray($form->getDataForDomain());
        $model->save();
    }

}
