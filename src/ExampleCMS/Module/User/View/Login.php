<?php

namespace ExampleCMS\Module\User\View;

use \ExampleCMS\View\Json as JsonView;

class Login extends JsonView
{

    /**
     *
     * @var Common
     */
    public $context;

    protected function process()
    {
        $model = $this->context->getModel();
        $form = $this->context->getForm();

        $form->bind('fromRequest', $this->request);
        $form->bind('toModel', $model);

        if (!$form->isValid()) {
            return $this->fetchErrors($form);
        }

        $repository = $this->context->getRepository();
        
        $user = $repository->findOneBy($model->toArray());
        
        if ($user->isNull()) {
            $this->response = array(
                'result' => false,
                'errors' => array(
                    'user_not_find',
                ),
            );

            return;
        }

        $repository->updateAuthUser($user);

        $this->go('read', $user);
    }
}
