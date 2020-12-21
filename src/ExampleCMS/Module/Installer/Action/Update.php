<?php

namespace ExampleCMS\Module\Installer\Action;

class Update extends \ExampleCMS\Action\Action
{

    /**
     * @var \ExampleCMS\FormManager
     */
    public $formManager;

    public function execute($request)
    {
        $form = $this->formManager->getForm($request);

        if (!$form->isValid()) {
            return false;
        }
        echo '<pre>';

        $data = $form->toArray();

        if (!empty($data['language'])) {
            $request->getAttribute('session')->set('language', $data['language']);
        }

        if (!empty($data['sql_engine'])) {
            $request->getAttribute('session')->set('sql_engine', $data['sql_engine']);
        }
        var_dump($form->getDomain());
        print_r($data);
        echo '</pre>';
    }

}
