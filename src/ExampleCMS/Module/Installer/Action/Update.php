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

        if ($data['sql_engine'] == 'sql_engine') {
            $this->config->set('setup', false);
        }
        print_r($data);
        echo '</pre>';
    }

}
