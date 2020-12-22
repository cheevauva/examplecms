<?php

namespace ExampleCMS\Application\View;

class Form extends Basic
{

    protected function getDefaultData()
    {
        return [
            'grids' => [],
        ];
    }

    public function execute($request)
    {
        $data = parent::execute($request);

        if (empty($data['module'])) {
            $data['module'] = $request->getAttribute('module');
        }

        foreach ($data['forms'] as $meta) {
            $form = $this->formManager->getFormModel($data['module'], $meta);
            $formMetadata = $form->getMetadata();

            if ($request->getAttribute('route') === $formMetadata['route']) {
                $form = $this->formManager->getFormByRequest($request);
            } else {
                $form = $this->formManager->createForm($request, $data['module'], $meta);
            }
        }

        $request = $request->withAttribute('model', $form);

        $data['method'] = $form->getMethod();
        $data['action'] = $form->getAction();
        $data['state'] = $form->getState();
        $data['state_reason'] = $form->getStateReason();

        foreach ($data['grids'] as $index => $meta) {
            $data['grids'][$index] = $this->module->grid($meta)->execute($request);
        }

        return $data;
    }

}
