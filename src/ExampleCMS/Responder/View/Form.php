<?php

namespace ExampleCMS\Responder\View;

class Form extends Basic
{

    public function getData($request)
    {
        $metadata = parent::getData($request);

        $form = $this->formManager->getFormModel($metadata['module'], $metadata['form']);

        $formMetadata = $form->getMetadata();
        
        if ($request->getAttribute('route') === $formMetadata['route']) {
            $form = $this->formManager->getForm($request);
        } else {
            $form = $this->formManager->createForm($request, $metadata['module'], $metadata['form']);
        }

        $metadata['method'] = $form->getMethod();
        $metadata['action'] = $form->getAction();
        $metadata['state'] = $form->getState();
        $metadata['state_reason'] = $form->getStateReason();

        $grid = $this->responder->grid($this->metadata['grid']);
        $grid->setModel($form);

        $metadata['grid'] = $grid->getData($request);

        return $metadata;
    }

}
