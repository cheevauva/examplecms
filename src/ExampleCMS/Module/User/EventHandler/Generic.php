<?php

namespace ExampleCMS\Module\User\EventHandler;

class Generic
{

    public $session;

    /**
     * @var \ExampleCMS\Factory\Repository
     */
    public $repositoryFactory;

    public function afterLogin($model)
    {
        $this->session->set('user_id', $model->get('id'));
    }

    public function tryDenyAccess($app)
    {
        if (!$app->router->get('firewall')) {
            return;
        }

        $module = $app->router->get('module');
        $operation = $app->router->get('operation');

        $currentUser = $this->module->getQuery('auth_user')->fetchOne();

        if ($currentUser->hasAccess($module, $operation)) {
            return;
        }

        throw $this->exceptionFactory->get('forbidden');
    }
}
