<?php

namespace ExampleCMS\Module\User\View;

use ExampleCMS\View\View as BaseView;

class Logout extends BaseView
{

    public function process()
    {
        $user = $this->context->getUser();
        $user->reset();

        $repository = $this->context->getRepository();
        $repository->updateAuthUser($user);

        $this->go('login', $user);
    }

    protected function getTemplateName()
    {
        return '';
    }
}
